<?php

namespace App\Http\Controllers\User;

use Excel;
use PDF;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Link\LinkRepositoryInterface;
use App\Repositories\Poll\PollRepositoryInterface;
use App\Repositories\Vote\VoteRepositoryInterface;
use App\Repositories\ParticipantVote\ParticipantVoteRepositoryInterface;

class ExportController extends Controller
{
    protected $linkRepository;
    protected $pollRepository;
    protected $voteRepository;
    protected $participantVoteRepository;

    public function __construct(
        LinkRepositoryInterface $linkRepository,
        PollRepositoryInterface $pollRepository,
        VoteRepositoryInterface $voteRepository,
        ParticipantVoteRepositoryInterface $participantVoteRepository
    ) {
        $this->linkRepository = $linkRepository;
        $this->pollRepository = $pollRepository;
        $this->voteRepository = $voteRepository;
        $this->participantVoteRepository = $participantVoteRepository;
    }

    public function getDataRender($pollId)
    {
        $poll = $this->pollRepository->find($pollId);
        $totalVote = config('settings.default_value');

        foreach ($poll->options as $option) {
            $totalVote += $option->countVotes();
        }

        $optionRate = [];

        if ($totalVote) {
            foreach ($poll->options as $option) {
                $countOption = $option->countVotes();
                $optionRate[] = [
                    'name' => $option->name,
                    'count' => $countOption,
                    'rate' => (int) ($countOption * 100 / $totalVote)
                ];
            }
        }

        $isRequiredEmail = Setting::where('poll_id', $pollId)->where('key', config('settings.setting.required_email'))->count() != config('settings.default_value');

        $voteIds = $this->pollRepository->getVoteIds($poll->id);
        $votes = $this->voteRepository->getVoteWithOptionsByVoteId($voteIds);
        $participantVoteIds = $this->pollRepository->getParticipantVoteIds($poll->id);
        $participantVotes = $this->participantVoteRepository->getVoteWithOptionsByVoteId($participantVoteIds);
        $mergedParticipantVotes = $votes->toBase()->merge($participantVotes->toBase());
        if ($mergedParticipantVotes->count()) {
            foreach ($mergedParticipantVotes as $mergedParticipantVote) {
                $createdAt[] = $mergedParticipantVote->first()->created_at;
            }

            $sortedParticipantVotes = collect($createdAt)->sort();
            $resultParticipantVotes = collect();
            foreach ($sortedParticipantVotes as $sortedParticipantVote) {
                foreach ($mergedParticipantVotes as $mergedParticipantVote) {
                    foreach ($mergedParticipantVote as $participantVote) {
                        if ($participantVote->created_at == $sortedParticipantVote) {
                            $resultParticipantVotes->push($mergedParticipantVote);
                            break;
                        }

                    }
                }
            }
            $mergedParticipantVotes = $resultParticipantVotes;
        }
        $dataRender = [
            'votes' => $mergedParticipantVotes,
            'poll' => $poll,
            'isRequiredEmail' => $isRequiredEmail,
            'numberOfVote' => config('settings.default_value'),
            'optionRate' => $optionRate,
        ];

        return $dataRender;
    }

    public function exportPDF(Request $request)
    {
        $inputs = $request->only('poll_id');
        $html = view('user.poll.details_layouts', $this->getDataRender($inputs['poll_id']));

        return PDF::load($html)->filename(trans('polls.vote') . '.pdf')->download();
    }

    public function exportExcel(Request $request)
    {
        $inputs = $request->only('poll_id');
        Excel::create(trans('polls.vote'), function($excel) use ($inputs) {
            $excel->sheet(trans('polls.vote_page'), function($sheet) use ($inputs){
                $sheet->loadView('user.poll.details_layouts_excel', $this->getDataRender($inputs['poll_id']));
            });
        })->store('xls', storage_path('exports'));
        $voteExcelFilePath = storage_path('exports') . '/' . trans('polls.vote') . '.xls';

        return response()->download($voteExcelFilePath, trans('polls.vote') . '.xls', [
            'Content-Type' => 'application/vnd.ms-excel',
            'Content-Disposition' => 'attachment; filename=' . trans('polls.vote') . '.xls'
        ]);
    }
}
