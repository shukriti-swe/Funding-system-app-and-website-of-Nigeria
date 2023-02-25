<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];
    public $generalsetting = [
        'site_name'       => 'required',
        'site_email'       => 'required',
        'c_symbol'       => 'required',
        'c_text'       => 'required',
        // 'site_banner'       => 'required',
    ];
    public $currencysett_errors = [
        'site_name' => [
            'required'   => 'Sorry! Site Name is required.'
        ],
        'site_email' => [
            'required'   => 'Sorry! Site Email is required.'
        ],
        'c_symbol' => [
            'required'   => 'Sorry! Currency Symbol is required.'
        ],
        'c_text' => [
            'required'   => 'Sorry! Currency text is required.'
        ],
        // 'site_banner' => [
        //     'required'   => 'Sorry! Site Banner is required.'
        // ],

    ];

    public $emailtemplate = [
        'email_template_type'       => 'required',
        'email_template_subject'       => 'required',
        'email_template'       => 'required',
    ];
    public $emailtemplate_errors = [
        'email_template_type' => [
            'required'   => 'Sorry! Email Template Type is required.'
        ],
        'email_template_subject' => [
            'required'   => 'Sorry! Email Template Subject is required.'
        ],
        'email_template' => [
            'required'   => 'Sorry! Email Template is required.'
        ],

    ];

    public $addfaq = [
        'question'       => 'required',
        'answer'       => 'required',
    ];
    public $addfaq_errors = [
        'question' => [
            'required'   => 'Sorry! Question is required.'
        ],
        'answer' => [
            'required'   => 'Sorry! Answer is required.'
        ],

    ];

    public $paymentsetting = [
        'paystack_test_mode'  => 'required',
        'paystack_test_secret_key' => 'required',
        'paystack_test_public_key' => 'required',
        'paystack_live_secret_key' => 'required',
        'paystack_live_public_key' => 'required',
    ];
    public $paymentsetting_errors = [
        'paystack_test_mode' => [
            'required'   => 'Paystack Test Mode is required.'
        ],
        'paystack_test_secret_key' => [
            'required'   => 'Paystack Test Secret Key is required.'
        ],
        'paystack_test_public_key' => [
            'required'   => 'Paystack Test Public Key is required.'
        ],
        'paystack_live_secret_key' => [
            'required'   => 'Paystack Live Secret Key is required.'
        ],
        'paystack_live_public_key' => [
            'required'   => 'Paystack Live Public Key is required.'
        ],

    ];

    public $systemsetting = [
        'mailchimp_api_key'  => 'required',
        'mailchimp_thrifter_list_name' => 'required',
        'stop_new_thrift' => 'required',
        'thrift_warning_1_title' => 'required',
        'thrift_warning_1_message' => 'required',
        'paystack_fees' => 'required',
        
    ];

    public $systemsetting_errors = [
        'mailchimp_api_key' => [
            'required'   => 'Paystack Test Mode is required.'
        ],
        'mailchimp_thrifter_list_name' => [
            'required'   => 'Paystack Test Mode is required.'
        ],
        'stop_new_thrift' => [
            'required'   => 'stop_new Thrift is required.'
        ],
        'thrift_warning_1_title' => [
            'required'   => 'Thrift Warning Title is required.'
        ],
        'thrift_warning_1_message' => [
            'required'   => 'Thrift Warning Message is required.'
        ],
        'paystack_fees' => [
            'required'   => 'Paystack fees is required.'
        ],
    ];

    public $referralsetting = [
        'referral_enabled'  => 'required',
        'referral_percentage' => 'required',
        'potential_winning' => 'required',
        'thrift_start_days' => 'required',
        'thrift_start_not_later' => 'required',
        'thrift_duration_in_month' => 'required',
        
    ];

    public $referralsetting_errors = [
        'referral_enabled' => [
            'required'   => 'Referral Enabled is required.'
        ],
        'referral_percentage' => [
            'required'   => 'Referral Percentage is required.'
        ],
        'potential_winning' => [
            'required'   => 'Potential Winning is required.'
        ],
        'thrift_start_days' => [
            'required'   => 'Thrift Start Days is required.'
        ],
        'thrift_start_not_later' => [
            'required'   => 'Thrift Start Not Later is required.'
        ],
        'thrift_duration_in_month' => [
            'required'   => 'Thrift duration in month.'
        ],
    ];
    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------
    public $forgotValidate = [
        'email' => [
            'label'  => 'email',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Email Is Required',
            ],
        ],
    ];
    public $resetValidate = [
        'code' => [
            'label'  => 'code',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Code Is Required',
            ],
        ],
    ];
    public $updateForgetPassValid = [
        'password' => [
            'label'  => 'password',
            'rules'  => 'required',
            'errors' => [
                'required' => 'password Is Required',
            ],
        ],
        'confirm_password' => [
            'label'  => 'confirm_password',
            'rules'  => 'required',
            'errors' => [
                'required' => 'confirm_password Is Required',
            ],
        ],
    ];

    public $termsandcondition = [
        'terms_and_conditions'       => 'required',
    ];
    public $termsandcondition_errors = [
        'terms_and_conditions' => [
            'required'   => 'Sorry! Terms and conditions is required.'
        ],

    ];
}
