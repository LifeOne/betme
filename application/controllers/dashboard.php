<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('Dashboards');
	}
	public function view_home(){

			redirect('profile_view');
		;
	}
	public function view_profile(){
		$id=$this->session->userdata('id');
		$user_info=$this->Dashboards->display_user_infos($id);
		$circles=$this->Dashboards->display_users_circles($id);
		$friends=$this->Dashboards->display_users_friends($id);
		$score= $this->Dashboards->display_global_user_scores($id);
		$data=array('user_data'=>$user_info, 'circle_data'=>$circles, 'friend_data'=>$friends, 'score'=>$score);
		$this->load->view('profile', $data);
	}
    public function view_leaderboards(){
        $id = $this->session->userdata['id'];
        $friend_leaders=$this->Dashboards->friend_leaderboards($id);
        $global_leaders=$this->Dashboards->global_leaderboards();
        $this->load->view('leaderboards', array("friends" => $friend_leaders, "global" => $global_leaders));
    }
    public function view_leaderboards2(){
        $id = $this->session->userdata['id'];
        $friend_leaders=$this->Dashboards->friend_leaderboards($id);
        $global_leaders=$this->Dashboards->global_leaderboards();
        $this->load->view('friendleaderboards', array("friends" => $friend_leaders, "global" => $global_leaders));
    }
	public function view_all_group(){
		$groups=$this->Dashboards->view_all_groups();
		$global_leaders=$global_leaders=$this->Dashboards->global_leaderboards();
		$data=array('groups'=>$groups, 'leaders'=>$global_leaders);
		$this->load->view('all_groups', $data);
	}
    public function add_event(){
        // post data should contain form data for event name, public or private, and hidden inputs for circle it was created in
        $event_info=$this->input->post();
        $time = $event_info['event_date'] . ' ' . $event_info['event_time'] . ':00';
        $pass = [$event_info['circle_id'], $event_info['event_name'], $time];
        $this->Dashboards->add_events($pass);
        redirect("group/{$event_info['circle_id']}");
    }
	public function remove_event($event_id){
		$this->Dashboards->remove_event($event_id);
		redirect('home');
	}
	public function add_topic(){
		// post data should contain form data for title, score, and hidden inputs for event it was created in and the circle it is in
		$id=$this->session->userdata('id');
		$topic_info=$this->input->post();
		$id2= $topic_info['event_id'];
		$this->Dashboards->add_topics($topic_info, $id);
		redirect("event/$id2");
	}
	public function remove_topic($topic_id){
		$this->Dashboards->remove_topics($topic_id);
		redirect('home');
	}
	public function add_topic_answer(){
		// post data should contain form data for answer and hidden input for topic id
		$answer_data=$this->input->post();
		$id=$answer_data['event_id'];
		if($answer_data['topic-answer']){
		$this->Dashboards->add_topic_answers($answer_data);
		redirect("event/$id");
		}
		if($answer_data['topic-response'])
			$user_id=$this->session->userdata('id');
		$validate= $this->Dashboards->add_topic_responses($answer_data, $user_id);
		if($validate== false){
			$this->session->set_flashdata('topic_id', $answer_data['topic_id']);
			$this->session->set_flashdata('response_error', 'YOU CANT ANSWER TWICE MOTHERFUCKER');
			redirect("event/$id");
		}
		redirect("event/$id");
	}
	public function add_topic_response(){
		// post data should contain form data for content and hidden inputs for user_id and topic_id
		$response_data=$this->input->post();
		$this->Dashboards->add_topic_responses($response_data);
		redirect('home');
	}
	public function add_score(){
		// button data should contain data for event_id
		$event=$this->input->post('event_id');
		$events_data= $this->Dashboards->pull_data_events($event);
		// $topics_data= $this->Dashboards->pull_data_topics($event);
		// $topic_responses= $this->Dashboards->pull_responses($event);
		$circle_id=$events_data[0]['circle_id'];
		$topics_info=$this->Dashboards->pull_topics_info($event);
		foreach($topics_info as $values){

			if($values['answer']==$values['content']){
				$id=$values['user_id'];
				$user_score=$this->Dashboards->pull_score($id, $circle_id);
				$new_user_score= $user_score['score'] + $values['score'];
				$this->Dashboards->add_scores($new_user_score, $id, $circle_id);
			}
		}
		$this->Dashboards->deactivate_events($event);
		redirect("group/$circle_id");
	}
	public function create_circle(){
		// post data should contain form data for name and private or public and hidden input for user_id
		$id=$this->session->userdata('id');
		$circle_info=$this->input->post();
		$this->Dashboards->create_circles($id, $circle_info);
		redirect('groups');
	}
	public function remove_circle($id){
		//button data containing circle id
		$this->Dashboards->remove_circes($id);
		redirect('home');
	}
	public function add_user_circle($user_id, $circle_id){
		// button data containing user id to be added and circle id
		$this->Dashboards->add_users_circle($user_id, $circle_id);
		redirect('home');
	}
	public function remove_user_circle($user_id, $circle_id){
		// button data containing user id to be removed and circle id
		$this->Dashboards->remove_users_circle($user_id, $circle_id);
		redirect('home');
	}
	public function add_friend(){
		// button data containing user id to be a friend
		$id=$this->session->userdata('id');
		$friend_id=$this->input->post('add');
		$this->Dashboards->add_freinds($id, $friend_id);
	}
	public function remove_friend(){
		// button data containing user id of friend to remove
		$id=$this->session->userdata('id');
		$friend_id=$this->input->post('remove');
		$this->Dashboards->remove_friends($id, $friend_id);
		redirect('friends');
	}
	public function friend_leaderboard(){
		$id=$this->session->userdata('id');
		$friend_leaders=$this->Dashboards->friend_leaderboards($id);
		// copied to other method
	}
	public function global_leaderboard(){
		$global_leaders=$this->Dashboards->global_leaderboards();
		// copied to other method
	}
	public function circle_leaderboard($circle_id){
		// needs href/url data on what circle we are in
		$circle_leaders=$this->Dashboards->circle_leaderboards($circle_id);
		// copied to other method
	}
	public function display_users_info(){
		$id=$this->session->userdata('id');
		$user_info=$this->Dashboards->display_user_infos($id);
		// should have all info on logged in user
		// copied to other methods

	}
  	public function display_users_circle(){
        // for a list of all the circles the user is in
        $id=$this->session->userdata('id');
        $circles=$this->Dashboards->display_users_circles($id);
        // should have circles and names and all the users to those circles to pass on to the view page
        $data = array("circles" => $circles);
        $this->load->view('my_groups', $data);
    }
	public function display_event_topic($event){
		// for a list of all the topics the event has
		// needs href/url data on what event we are in
		$topics=$this->Dashboards->display_event_topics($event);
		$circle_data=$this->Dashboards->display_circles_info_in_topics($event);
		// var_dump($event);
		// die();
		$data=array('info'=>$topics, 'id'=>$event, 'circle_data' => $circle_data);
		// should have all topic data to pass to view page
		$this->load->view('event', $data);
	}
	public function display_users_friend(){
		// for a list of all the users friends
		$id=$this->session->userdata('id');
		$friends=$this->Dashboards->display_users_friends($id);
		$data=array('friends'=>$friends);
		// should have all friends of the user
		$this->load->view('friends', $data);
	}
	public function display_users_friend2($g_id){
        // for a list of all the users friends
        $id=$this->session->userdata('id');
        $friends=$this->Dashboards->display_users_friends($id);
        // should have all friends of the user
        $this->load->view('add_to_group', $g_id);
    }
    public function display_circle($circle_id){
        // for all of the different data that we will display in a circle/group
        // needs href/url for what circle was clicked into
        $circle_data=$this->Dashboards->display_circles($circle_id);
        $circle_leaders=$this->Dashboards->circle_leaderboards($circle_id);
       $comment_info=$this->Dashboards->display_comments($circle_id);
       // should have a lot of information to potentially display about circle/group
       $data = array("data" => $circle_data, "leaders" => $circle_leaders, "comments"=>$comment_info);
        $this->load->view('group', $data);
    }
	public function display_global_user_score(){
		$id=$this->session->userdata('id');
		$score= $this->Dashboards->display_global_user_scores($id);
	}
	public function update_prof_description(){
		$id=$this->session->userdata('id');
		$description=$this->input->post();
		$this->Dashboards->update_prof_descriptions($id, $description);
		redirect('profile_view');

	}
	public function add_comment(){
        $id=$this->session->userdata('id');
        $info=$this->input->post();
        $circle_id=$info['circle_id'];
        $this->Dashboards->add_comments($id, $info);
        redirect("group/$circle_id");
  }
}
?>
