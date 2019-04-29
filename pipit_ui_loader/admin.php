<?php
    $this->register_app('pipit_ui_loader', 'UI loader', 99, 'UI loader', '1.0', true);
    $this->require_version('pipit_ui_loader', '3.0');
    
    
	if(defined('PIPIT_UI_LOADER_FILEPATH') && is_file(PIPIT_UI_LOADER_FILEPATH)) {
        $API  = new PerchAPI(1.0, 'pipit_ui_loader');
        $Perch = Perch::fetch();
        
        $config = include PerchUtil::file_path(PIPIT_UI_LOADER_FILEPATH);
        //PerchUtil::debug(($config));

        // load CSS
        if(isset($config['css']) && is_array($config['css'])) {
            foreach($config['css'] as $file) {
                $Perch->add_css($file);
            }
        }


        // load JS
        if(isset($config['js']) && is_array($config['js'])) {
            foreach($config['js'] as $file) {
                $Perch->add_javascript($file);
            }
        }


        // favicon
        if(isset($config['favicon'])) {
            $Perch->add_head_content('<link rel="shortcut icon" href="'. $config['favicon'] .'">');
        }

    } else {
        PerchUtil::debug('Pipit UI loader: file path is not set or file does not exist', 'error');
    }