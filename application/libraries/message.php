<?php

class Message{
    function __construct(){
        $CI =& get_instance();
        $this->instan = $CI;
    }
    
    public function message_error($content){
        $msg = '<div id="box-messages">
                <div class="messages">
                <div id="message-error" class="message message-error">
                        <div class="image">
                                <img src="'.base_url().'resources/images/icons/error.png" alt="Error" height="32" />
                        </div>
                        <div class="text">
                                <h6>Error Message</h6>
                                <span>'.$content.'</span>
                        </div>
                        <div class="dismiss">
                                <a href="#message-error"></a>
                        </div>
                </div>
                </div>
                </div>';
        return $msg;
    }
    public function message_success($content){
        $msg = '<div id="box-messages">
                <div class="messages">
                <div id="message-success" class="message message-success">
                        <div class="image">
                                <img src="'.base_url().'resources/images/icons/Success.png" alt="Error" height="32" />
                        </div>
                        <div class="text">
                                <h6>Success Message</h6>
                                <span>'.$content.'</span>
                        </div>
                        <div class="dismiss">
                                <a href="#message-success"></a>
                        </div>
                </div>
                </div>
                </div>';
        return $msg;
    }
    public function dialog(){
        $dialog ='<div id="dialog-confirm" title="Are You Sure want to delete this?">
			<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>These items will be permanently deleted and cannot be recovered. Are you sure?</p>
		</div>';
        return $dialog;
    }
}

