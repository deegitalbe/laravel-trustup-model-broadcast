<?php

return [
    /**
     * Unique app key used for event names.
     * 
     * @var string
     */
    "app_key" => env("TRUSTUP_MODEL_BROADCAST_APP_KEY"),

    /**
     * Broadcast options
     */
    "broadcast" => [
        /**
         * Separator used for channel names.
         * 
         * @var string
         */
        "channel_separator" => "-",

        /**
         * Separator used for event names.
         * 
         * @var string
         */
        "event_separator" => ":",
    ]
];