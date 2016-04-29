<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboards extends CI_Model {
    function add_events($event){
        $query="INSERT INTO events(event_name, circle_id, event_time, created_at, updated_at) VALUES (?,?,?,NOW(),NOW())";
        $values=array($event[1], $event[0], $event[2]);
        return $this->db->query($query, $values);
    }
	function remove_events($id){
		$query="DELETE FROM event WHERE events.id= ?";
		return $this->db->query($query, $id);
	}
	function add_topics($topic, $id){
		$query="INSERT INTO topics(title, score, user_id, event_id, created_at, updated_at) VALUES (?,?,?,?, NOW(), NOW())";
		$values=array($topic['topic-question'], $topic['topic-score'], $id, $topic['event_id']);
		return $this->db->query($query, $values);
	}
	function remove_topics($id){
		$query="DELETE FROM topics WHERE topics.id= ?";
		return $this->db->query($query, $id);
	}
   function add_topic_answers($userdata){

        $query="UPDATE topics SET answer = ? WHERE topics.id = ?";
        $values=array($userdata['topic-answer'], $userdata['topic_id']);
        return $this->db->query($query, $values);
    }
    function add_topic_responses($userdata, $id){
        $query = "SELECT user_id FROM topic_responses WHERE user_id = ? AND topic_id = ?";
        $values = array($id, $userdata['topic_id']);
        $result = $this->db->query($query, $values)->row_array();
        if($result) {
          return false;
        } else {
          $query="INSERT INTO topic_responses(content, user_id, topic_id) VALUES (?,?,?)";
          $values=array($userdata['topic-response'], $id, $userdata['topic_id']);
          return $this->db->query($query, $values);
        }
    }
	function pull_data_events($id){
		$query="SELECT * FROM events WHERE events.id=?";
		return $this->db->query($query, $id)->result_array();
	}
	// function pull_data_topics($id){
	// 	$query="SELECT * FROM topics WHERE topics.event_id=?";
	// 	return $this->db->query($query, $id)->result_array();
	// }
	// function pull_responses($id){
	// 	$query="SELECT * FROM topics WHERE topics.event_id=?";
	// 	$topics=$this->db->query($query, $id)->result_array();
	// 	foreach($topics as $topic){
	// 		$query="SELECT * FROM topic_responses WHERE topic_responses.topic_id=?";
	// 		$values=array($topic['id']);
	// 		$returned[]=$this->db->query($query, $values)->result_array();
	// 	}
	// 	return $returned;
	// }
	function pull_topics_info($id){
		$query="SELECT * FROM topics JOIN topic_responses ON topics.id=topic_responses.topic_id WHERE topics.event_id=?";
		return $this->db->query($query, $id)->result_array();
	}
	function pull_score($id, $circle_id){
		$query="SELECT score FROM scores WHERE user_id =? AND circle_id =?";
		$values=array($id, $circle_id);
		return $this->db->query($query, $values)->row_array();
	}
	function add_scores($score, $id, $circle_id){
		$query="UPDATE scores SET score=? WHERE user_id =? AND circle_id =?";
		$values=array($score, $id, $circle_id);
		return $this->db->query($query, $values);
	}
	function deactivate_events($id){
		$query="UPDATE events SET active=1 WHERE id=?";
		return $this->db->query($query, $id);
	}
	function create_circles($id, $info){
		$query="INSERT INTO circles(name, pub_private, admin_user_id) VALUES (?,?,?)";
		$values=array($info['name'], $info['publicity'], $id);
		$this->db->query($query, $values);
		$query="SELECT id FROM circles WHERE name=?";
		$values=array($info['name']);
		$circle_id=$this->db->query($query, $values)->row_array();
		$query="INSERT INTO user_circles(user_id, circle_id) VALUES (?,?)";
		$values=array($id, $circle_id['id']);
		$this->db->query($query, $values);
		$query="INSERT INTO scores(score, user_id, circle_id, created_at, updated_at) VALUES (0,?,?, NOW(), NOW())";
		$values=array($id, $circle_id['id']);
		return $this->db->query($query, $values);
	}
	function remove_circles($id){
		$query="DELETE FROM circles WHERE circles.id= ?";
		return $this->db->query($query, $id);
	}
	function add_users_circle($user, $circle){
		$query="INSERT INTO user_circles(user_id, circle_id) VALUES (?,?)";
		$values=array($user, $circle);
		$this->db->query($query, $values);
		$query="INSERT INTO scores(score, user_id, circle_id, created_at, updated_at) VALUES (0,?,?, NOW(), NOW())";
		$values=array($user, $circle);
		return $this->db->query($query, $values);
	}
	function remove_users_circle($user, $circle){
		$query="DELETE FROM user_circles WHERE user_id=? AND circle_id=?";
		$values=array($user, $circle);
		return $this->db->query($query, $values);
	}
	function add_friends($id, $friend_id){
		$query="INSERT INTO friendships VALUES (?,?)";
		$values=array($id, $friend_id);
		$this->db->query($query, $values);
		$values=array($friend_id, $id);
		return $this->db->query($query, $values);
	}
	function remove_friends($id, $friend_id){
		$query="DELETE FROM friendships WHERE user_id=? AND friend_id=?";
		$values=array($id, $friend_id);
		$this->db->query($query, $values);
		$query="DELETE FROM friendships WHERE friend_id=? AND user_id=?";
		return $this->db->query($query, $values);
	}
	function friend_leaderboards($id){
		$query="SELECT username, score FROM users LEFT JOIN scores ON users.id=scores.user_id WHERE user_id=(SELECT friend_id FROM friendships WHERE user_id=?) AND circle_id=1 ORDER BY score desc";
		return $this->db->query($query, $id)->result_array();
	}
	function global_leaderboards(){
		$query="SELECT username, score FROM users LEFT JOIN scores ON users.id=scores.user_id WHERE circle_id=1 ORDER BY score desc";
		return $this->db->query($query)->result_array();
	}
	function circle_leaderboards($id){
		$query="SELECT username, score FROM users LEFT JOIN scores ON users.id=scores.user_id WHERE circle_id=? ORDER BY score desc";
		return $this->db->query($query, $id)->result_array();
	}
	function display_user_infos($id){
		$query="SELECT * FROM users WHERE users.id=?";
		return $this->db->query($query, $id)->row_array();
	}
   function display_users_circles($id){
        $query="SELECT * FROM users LEFT JOIN user_circles ON users.id=user_circles.user_id LEFT JOIN circles ON user_circles.circle_id=circles.id WHERE user_circles.user_id=?";
        return $this->db->query($query, $id)->result_array();
    }
	function display_event_topics($id){
		$query="SELECT * FROM topics WHERE topics.event_id=?";
		return $this->db->query($query, $id)->result_array();
	}
	function display_users_friends($id){
		$query="SELECT * FROM users JOIN friendships ON users.id=friendships.user_id JOIN users as friends ON friendships.friend_id=friends.id LEFT JOIN scores ON friendships.friend_id=scores.user_id WHERE friendships.user_id=?";
		return $this->db->query($query, $id)->result_array();
	}

    function display_circles($id){
        $return = [];
        $query = "SELECT * FROM circles WHERE id = ?";
        $return[0] = $this->db->query($query, $id)->row_array();
        $query = "SELECT * FROM users JOIN user_circles ON users.id = user_circles.user_id WHERE user_circles.circle_id = ?";
        $return[1] = $this->db->query($query, $id)->result_array();
        $query = "SELECT * FROM events WHERE circle_id = ?";
        $return[2] = $this->db->query($query, $id)->result_array();
        return $return;
    }
    function display_circles_info_in_topics($e_id){
        $return = [];
        $query = "SELECT * FROM events WHERE id = ?";
        $var = $this->db->query($query, $e_id)->row_array();
        $id = $var['circle_id'];
        $query = "SELECT * FROM circles WHERE id = ?";
        $return = $this->db->query($query, $id)->row_array();
        // $return = $return['id'];
        $return = ['circle_id' => $return['id'], 'admin_id' => $return['admin_user_id']];
        return $return;
    }
	function view_all_groups(){
       $return = [];
       $query="SELECT * FROM circles";
       $circles = $this->db->query($query)->result_array();
       foreach($circles as $circle) {
         $query = "SELECT * FROM user_circles WHERE circle_id = {$circle['id']}";
         $users = $this->db->query($query)->result_array();
         $members = count($users);
         $return[] = array($members, $circle);
       }
       return $return;
	}

	function display_global_user_scores($id){
		$query="SELECT * FROM scores WHERE user_id=? AND circle_id=1";
		return $this->db->query($query, $id)->row_array();
	}
	function update_prof_descriptions($id, $info){
		$query="UPDATE users SET prof_description=? WHERE users.id=?";
		$values=array($info['description'], $id);
		return $this->db->query($query, $values);
	}

  function add_comments($id, $info){
    $query="INSERT INTO comments(content, user_id, circle_id, created_at, updated_at) VALUES (?,?,?, NOW(), NOW())";
    $values=array($info['message'], $id, $info['circle_id']);
    return $this->db->query($query, $values);
  }
  function display_comments($id){
    $query="SELECT * FROM comments LEFT JOIN users ON comments.user_id=users.id WHERE circle_id=? ORDER BY comments.id desc";
    return $this->db->query($query, $id)->result_array();
  }
}
