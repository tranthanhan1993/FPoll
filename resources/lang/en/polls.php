<?php

return [
    'title' => 'Poll',
    'head' => [
        'create' => 'CREATE A POLL',
        'index' => 'LIST ALL POLLS',
    ],
    'label' => [
        'step_1' => 'Poll Information',
        'full_name' => 'Full-name*',
        'email' => 'E-Mail Address*',
        'chatwork' => 'Chatwork ID',
        'title' => 'Title*',
        'description' => 'Description',
        'location' => 'Location',
        'type' => 'Type*',
        'single_choice' => 'Single choice',
        'multiple_choice' => 'Multiple choice',
        'poll_opening' => '<span class="label label-success">opening</span>',
        'poll_closed' => '<span class="label label-danger">closed</span>',
        'step_2' => 'Poll Option',
        'step_3' => 'Poll Setting',
        'setting' => [
            'required_email' => 'Required email to voting',
            'add_answer' => 'Allow voters to add new answers',
            'hide_result' => 'Hide voting result',
            'custom_link' => 'Optimize poll link',
            'set_limit' => 'Set voting limit',
            'set_password' => 'Set password',
        ],
        'step_4' => 'Participant',
        'invite' => 'Invite*',
        'invite_all' => 'Everyone with a link can participate',
        'invite_people' => 'Only invited people can participate',
        'search' => 'Search poll information...',
    ],
    'label_for' => [
        'full_name' => 'name',
        'email' => 'email',
        'chatwork' => 'chatwork',
        'title' => 'title',
        'description' => 'description',
        'location' => 'location',
        'type' => 'type',
        'single_choice' => 'single',
        'multiple_choice' => 'multiple',
        'invite' => 'invite',
        'invite_all' => 'all',
        'invite_people' => 'people',
    ],
    'placeholder' => [
        'full_name' => 'Enter your name... ',
        'email' => 'Enter your email address... ',
        'chatwork' => 'Enter your chatwork id... ',
        'title' => 'Enter poll title... ',
        'description' => 'Enter description title... ',
        'location' => 'Enter a location... ',
        'number_add' => 'Number...',
        'number_limit' => 'Number limit...',
        'password_poll' => 'Enter password of poll...',
        'option' => 'Enter option of poll...',
        'email_participant' => 'Enter email of participant...',
    ],
    'button' => [
        'search_poll' => 'SEARCH NOW',
    ],
    'message' => [
        'create_success' => 'Create poll SUCCESS',
        'create_fail' => 'Create poll FAIL',
        'upload_image_fail' => 'Can\'t upload image of option',
        'confirm_delete' => 'Are you sure you want to delete this poll?',
        'link_exists' => 'Link exist in system. Please enter a new link',
        'link_valid' => 'Link valid. You can use this link',
        'submit_form' => 'Good job!\', \'Saving...!\', \'success',
    ],
    'validation' => [
        'name' => [
            'required' => 'Please enter your name!',
            'max' => 'Name is maximum' . config('settings.length_poll.name') . 'characters',
        ],
        'email' => [
            'required' => 'Please enter your email!',
            'max' => 'Email is maximum' . config('settings.length_poll.email') . 'characters',
            'email' => 'Email invalid!'
        ],
        'title' => [
            'required' => 'Please enter poll title!',
            'max' => 'Title is maximum' . config('settings.length_poll.title') . 'characters',
        ],
        'description' => [
            'max' => 'Ddescription is maximum' . config('settings.length_poll.description') . 'characters',
        ],
        'type' => [
            'required' => 'Please choose type of poll',
        ],
        'option' => [
            'option' => 'Please enter one option of poll',
        ],
        'email_poll' => [
            'email_poll' => 'Please enter one email of participant',
        ],
        'custom_link' => [
            'setting' => 'Please enter link of poll',
        ],
        'set_limit' => [
            'setting' => 'Please enter number vote of poll',
        ],
        'set_password' => [
            'setting' => 'Please enter password of poll',
        ],
    ],
    'poll' => 'Poll',
    'close' => 'Close',
    'name' => 'Name',
    'email' => 'Email',
    'no' => 'No',
    'poll_history' => 'Poll History',
    'show_vote_details' => 'Show vote details',
    'placeholder' => [
        'title' => 'Enter a title...',
        'location' => 'Enter a location...',
        'description' => 'Enter description...',
        'your_name' => 'Enter your name...',
        'email' => 'Enter your email...',
        'enter_name' => 'Enter your name...',
        'comment' => 'Enter a comment...',
    ],
    'next' => 'Next',
    'optional' => 'optional',
    'one_answer' => 'One answer',
    'multiple_answer' => 'Multiple answers',

    'poll_details' => 'Poll Details',
    'poll_initiate' => 'Poll initiated by',
    'where' => 'Where',
    'vote' => 'Vote',
    'comments' => 'Comments',
    'add_comment' => 'Add a comment',
    'show_comments' => 'Show comments',
    'hide' => 'Hide',
    'save_comment' => 'Save Comment',
    'view_history' => 'Views History',
    'delete_all_participants' => 'Delete all participants',
    'list_polls' => 'List Polls',
    'polls_initiated' => 'Polls initiated',
    'subject' => 'Subject',
    'participants' => 'Participants',
    'latest_activity' => 'Latest activity',
    'polls_participated_in' => 'Polls participated in',
    'polls_closed' => 'Polls closed',
    'list_all_polls' => 'List all Polls',
    'administer' => 'Administer',
    'close_poll' => 'Close this poll',
    'reopen_poll' => 'Reopen',
    'confirm_close_poll' => 'Are you want to close this poll?',
    'close_poll_successfully' => 'Poll closed successfully',
    'close_poll_fail' => 'Poll closed fail',
    'reopen_poll_fail' => 'Reopen poll fail',
    'reopen_poll_successfully' => 'Reopen poll sucessfully',
    'poll_not_found' => 'Poll not found',
    'message_name' => 'Please provide your name to vote',
    'message_email' => 'Please provide your email to vote',
    'message_validate_email' => 'Please provide a valid email',
    'voted_poll' => 'You voted this poll, if you want to edit vote bofore, you need to vote one more time',
    'message_poll_limit' => 'Sorry, You can not vote this poll, poll reached limit',
    'message_poll_closed' => 'Sorry, Poll closed. You can not view and vote this poll',
    'comment_name' => 'Please enter your name in the input field',
    'comment_content' => 'Please enter a comment in the text area',
    'confirmRemove' => 'Are you sure?',
];
