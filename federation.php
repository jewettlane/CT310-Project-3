<?php

class Controller_Federation extends Controller_Base
{
		//home page
	public function action_index() {
		$demos = Model_Attraction::find("all");
		//creating attraction page
		foreach($demos as $attid){
		Uri::create('index.php/federation/attraction/'.$attid->id); 
		}

		// creating attraction image page
		foreach($demos as $attid){
			Uri::create('index.php/federation/attrimage/'.$attid->id); 
			}
	}
	
	 public function action_status() {
	
        $s = $array = array('status' => 'open');
        $jj = Format::forge($s)->to_json();

        return $jj;
	} 

	 public function action_allstatus() {
	
	$view = View::forge('federation/allstatus');
       $this->template->title = 'All status';
       $this->template->content = $view;
	} 

	public function action_allattraction() {
	
		$view = View::forge('federation/allattraction');
	   $this->template->title = 'All Attractions';
	   $this->template->content = $view;
	} 

	

	public function action_listing() {
		$demos = Model_Attraction::find("all");

		$arr = array();

		foreach ($demos as $list){
			array_push($arr,array('id' => $list->id,'name' => $list->title, 'state' => $list->states->name));
		}

		$stateList = Format::forge($arr)->to_json();

		return $stateList;
	}

	public function action_attraction($s) {
		$demos = Model_Attraction::find($s);
		$arr = array('id' => $demos->id,'name' => $demos->title, 'desc' => $demos->summary, 'state' => $demos->states->name);
		$attractionDetails = Format::forge($arr)->to_json();

		return $attractionDetails;

	}

	public function action_attrimage($imageid) {
		$demos = Model_Attraction::find($imageid);
		$attrImage = $demos->image_url;
		$response = Response::forge(file_get_contents(Asset::get_file($attrImage, 'img')));
		$response->set_header('Content-Type', 'image/jpeg');
		return $response;
		
	}
	
	public function action_viewAtt($id, $eid) {
		$view = View::forge('federation/viewAtt');
       $this->template->title = 'Amazing Site';
       $this->template->content = $view;
		
		
		
	}
	public function action_shopcart(){
		$data = array();
		$view = View::forge('federation/shopcart', $data);
		$this->template->title = 'Buy Travel Brochures';
		$this->template->content = $view;

		if (Input::post('Order')){
			$Quantity = filter_var(Input::post('Quantity'), FILTER_SANITIZE_STRING);
			$Brochure = Input::post('Brochure');
			$Name = filter_var(Input::post('Name'), FILTER_SANITIZE_STRING);
			$to = Input::post('emailAdd');

			$subject = "Travel Brochure Order";
			$txt = "You have ". $Quantity." "."'".$Brochure."'"." brochures coming to"." ".$Name;
			$admintext = $Quantity." "."'".$Brochure."'"." brochures ordered to"." ".$Name;

		
			
			
		mail($to,$subject,$txt);
		mail('Aaron.Pereira@colostate.edu',$subject,$admintext);
		mail('ct310@cs.colostate.edu',$subject,$admintext);
		Session::set_flash('success', 'Thank you for ording! Email has been sent.');
		Response::redirect('federation/shopcart');
		
		}
		
	}
	
	
	

}
