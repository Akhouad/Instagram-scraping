<?php 
class Instagram{
    public $username;
    private $html;
    public $posts = [];

    public function __construct($username){
        $this->username = $username;
        $this->html = file_get_contents('https://www.instagram.com/' . $username);
        $this->followings();
        $this->followers();
        $this->posts();
        $this->photo();
        $this->html = null;
    }

    public function followings(){
        preg_match('/("edge_follow"):{[a-zA-Z0-9 -_]+}/i', $this->html, $matches);
        $this->followings = str_replace('}', '', explode(':', $matches[0])[2]);
    }

    public function followers(){
        preg_match('/("edge_followed_by"):{[a-zA-Z0-9 -_]+}/i', $this->html, $matches);
        $this->followers = str_replace('}', '', explode(':', $matches[0])[2]);
    }

    public function photo(){
        preg_match('/("profile_pic_url_hd"):"[a-zA-Z0-9 -_]+(.jpg)"/i', $this->html, $matches);
        $this->photo = str_replace('"', '', explode(':"', $matches[0])[1]);
    }

    public function posts(){
        preg_match('/("edge_owner_to_timeline_media"):(\{.*?\]\},("edge_saved_media"))/i', $this->html, $matches);
        $matches[0] = str_replace(',"edge_saved_media"', '', str_replace('"edge_owner_to_timeline_media":', '', $matches[0]));
        $media = (array) json_decode($matches[0]);
        $media = $media['edges'];
        
        foreach($media as $m){
            $this->posts[] = [
                'display_url' => $m->node->display_url,
                'likes' => $m->node->edge_media_preview_like->count,
                'comments' => $m->node->edge_media_to_comment->count
            ];
        }
    }
}