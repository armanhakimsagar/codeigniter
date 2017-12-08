CONFIGURATION :


-> Troubleshooting (config URI Protocol information) :

  * confiq/confiq.php 

	* set base url (http://codeigniter/projectname)
	
	* set index_page blank
	
	* uri_protocol = 'REQUEST_URI';    // The default setting of 'REQUEST_URI' works for most servers
	
	* set enciption key
	
	* url suffix use as file extention. 
	
	  $config['url_suffix'] = '.asp';   // for check from view echo site_url('routename');
	  
	* 


   * enable mod_rewrite :
   
   C:\wamp\bin\Apache\conf\httpd.conf (wamp)
   C:\xampp\Apache\conf\httpd.conf    (xampp)
   
   LoadModule rewrite_module modules/mod_rewrite.so (remove hash)
   
   Remove index.php from url :
 
   * set .htaccess in root :
 
     <IfModule mod_rewrite.c>
	RewriteEngine On
	RewriteCond %{REQUEST_FILENAME} !-f
	RewriteCond %{REQUEST_FILENAME} !-d
	RewriteRule ^(.*)$ index.php/$1 [L] 
     </IfModule>
     
     
     

-> Database Setting :

  config/database
   


-> confiq-autoload-libraries add 

   database , form_validation , session , cart
   
   (library are class)
   
   
-> helper add url,file,form
   
   (helper are function)
   


-> confiq/controllers 
 
   class Welcome extends MY_Controller {
   
   }

  * class name & controller name must be same.
  * class first letter must be capital.
  * index method load at beggining.
  
  
  
  
-> EXTENDS CORE CLASS :
	
    application/core/MY_CONTROLLER.php
	
    class MY_CONTROLLER extends CI_CONTROLLER{

     }
	
	
    class abc extends MY_CONTROLLER{
	
    }
	



  
  
-> Create Custom class :

   create class in application/library folder.
   
   class Abc{

	public function method(){
	
	}
   }

   use this by :
   
   $this->load->library('Abc');  // link library
   $this->Abc = new abc;         // create object
   $this->Abc->method();
   
   

-> Extends Custom Class :

   app/library :

	class MY_Email extends CI_EMAIL{
	
	}


   use it :
   
   $this->load->library('email');
   $this->email->abc();






_______________________________________________



  
INSTALL TEMPLATE :
  
  
1. create assets folder in root & paste all css js.

2. extract header.php & footer.php then include.

3. Link File :

	url helper :
	
	<?php echo base_url() ?> before all link  || OR
	
	html helper :
	
	echo link_tag('css/mystyles.css');
	
	
4. confiq/route.php

   $route['uri'] = 'Controller/method';
   
   $route['uri/:num'] = 'Controller/method';                        // number allow
   
   $route['uri/uri'] = 'Controller/method';
   
   $route['uri/(:any)'] = 'Controller/method';                     // anything after uri will load controller & method
   
   $route['uri/products/([a-z]+)/(\d+) '] = 'Controller/method';   // uri/abc/number
   
   There are three reserved routes:
   
   $route['default_controller'] = 'welcome';
   
   $route['404_override'] = '';
   
   $route['translate_uri_dashes'] = TRUE;                         // it will remove ALL dashes in the controller and method URI segments
                                                                     $route['url'] = 'home-controller/method';
   
   
   

    

_______________________________________________


ARRAY HELPER :


$this->load->helper('array');

$quotes = array(
        "I find that the harder I work, the more luck I seem to have. - Thomas Jefferson",
        "Don't stay in bed, unless you can make money in bed. - George Burns",
        "We didn't lose the game; we just ran out of time. - Vince Lombardi"
);

echo random_element($quotes);			// fetch random quotes




$array = array(
        'color' => 'red',
        'shape' => 'round',
        'radius' => '10',
        'diameter' => '20'
);

$my_shape = elements(array('color', 'shape', 'height'), $array);

print_r($my_shape);			        // set new element



_______


Download Helper :


$this->load->helper('download');

force_download('file name', NULL);


_______


Directory Helper :


$this->load->helper('directory');

$map = directory_map('./uploads/');

echo "<pre>";

print_r($map);

return full file list.


_______


PATH Helper :

$this->load->helper('path');

$non_existent_file = 'C:\Users\m\esktop\git.txt';
echo set_realpath($non_existent_file, TRUE);               // return true if path exists


_______


Number Helper :

$this->load->helper('number');

echo byte_format(123456789123456789); 			   // Returns 11,228.3 TB


______

security helper :

$this->load->helper('security');

$str = "fvdgff";
$this->load->helper('security');
$str = do_hash($str); // SHA1
$str = do_hash($str, 'md5'); // MD5
echo $str;







_______________________________________________





FORM CREATE :


	// form open

	$attributes = array('class' => 'email', 'id' => 'myform');
	echo form_open_multipart('abc/def', $attributes);

	// input type

	$data = array(
        'type'  => 'text',
        'name'  => 'email',
        'id'    => 'hiddenemail',
        'value' => 'john@example.com',
        'class' => 'hiddenemail',
        'OnBlur'=> "alert('ok')"
	);

	echo form_input($data);


	// select box 

	<select name="">
		
	   <option> value </option>
	
	</select>
	
	
	// checkbox 


	$data = array(
        'name'          => 'newsletter',
        'id'            => 'newsletter',
        'value'         => 'accept',
        'checked'       => TRUE,
        'style'         => 'margin:10px'
	);

	echo form_checkbox($data);



	// input type radio

	$data = array(
        'type'  => 'radio',
        'name'  => 'gender',
        'checked' => TRUE,
        'class' => 'hiddenemail',
        'value' => 'male'
	);

	echo form_radio($data);

	$data = array(
        'type'  => 'radio',
        'name'  => 'gender',
        'class' => 'hiddenemail',
        'value' => 'female'
	);

	echo form_radio($data);

	// input type file
	
	$data = array(
		'type'  => 'file',
		'name'  => 'file'
	);

        echo form_input($data);
	
	// input type submit 


	$data = array(
        'name'          => 'button',
        'id'            => 'button',
        'value'         => 'true',
        'type'          => 'submit',
        'content'       => 'Reset'
	);

	echo form_submit($data);


	// txtarea 

	$textarea_options = array('class' => 'form-control','rows' => 4,   'cols' => 40);

	echo form_textarea('vc_desc', set_value('vc_desc'),  $textarea_options);



	// form close 

	echo form_close();



	// print_r all data

	print_r($this->input->post());




_______________________________________________



VALIDATION IN CONTROLLER :


1.      required need for all type of checkbox & radio 



	$config = array(

		array(
			'field' => 'email',
			'label' => 'email',
			'rules' => 'required',
			'errors' => array(
				'required' => 'You must provide a %s.',
			),
		),
		
		array(
			'field' => 'select_name',
			'label' => 'select_name',
			'rules' => 'required|callback_function_name', //[for checkbox select box image]
			
		)
	  );

	$this->form_validation->set_rules($config);

	
	
	** callback function for validation:
	___________________________________
	
	
	public function function_name(){
	
	     if($this->input->post('select_name') == '0'){
		$this->form_validation->set_message("function_name","please select a box");
		return false;
	     }else{
		return true;
	     }
	     
	}
	
	
	function validate_image_function(){

	    if($_FILES['file']['name'] == ""){
			$this->form_validation->set_message('validate_image',"file is empty");
			return false;
	    }

	}  


	
	
2.	Rules :
	
	required 
	min_length[5]
	max_length[12]
	exact_length[8]
	is_unique[table.field]
	matches[form_fieldname]
	trim
	regex_match[/^[A-Z]+[0-9]+$/]  [charecter then number]
	function_name
	valid_email
	
	


3.     Show Validation Error :

	 if($this->form_validation->run() == FALSE){

		$this->load->view('pagename');

	  }
	  
       in view.php
       
       echo validation_errors();


5.     indivisual error output:

       <?php echo form_error('username'); ?>
	


6.     For Show Previous Value Set :

       'value' => set_value('email')
  
  
  
  
_______________________________________________



INSERT DATA & IMAGE UPLOAD : 

rules :

1. insert direct country_name in field
2. set radio value male or female & insert it



* Controller->


if($this->form_validation->run() == TRUE){

	$attr = array(

	   'database_field_name' => $this->input->post('field_name'),
	   'database_field_name' => $_FILES['file']['name'],

	);
	
	$this->load->model('insert_product');
	
	$result = $this->insert_product->insert_model($attr);


	
	// after insert data upload image
			
	if(!empty($_FILES['file']['name'])){
	
		// create a uploads folder in root directory
		$config['upload_path'] = 'uploads';
	    	$config['allowed_types'] = 'jpg|jpeg|png|gif';
		
		// here file_name is fixed
		$config['file_name'] = $_FILES['file']['name'];

		//Load upload library and initialize configuration
		$this->load->library('upload',$config);
		$this->upload->initialize($config);

		if($this->upload->do_upload('file_name_here')){
		    $uploadData = $this->upload->data();
		    // here file_name is fixed
		    $picture = $uploadData['file_name'];
		}
		
	    }

}


* Model->

class insert_product extends CI_MODEL{

	public function insert_model($attr){
		$result = $this->db->insert('tablename',$attr);
		return $result;
	}

}





	

_______________________________________________



CAPTCHA Helper :


VIEW PAGE :

    
    
    echo $captchaImg; 
    $data = array(
	'type'  => 'text',
	'name'  => 'captcha'
    );

    echo form_input($data);
    
    
    


IN VIEW CONTROLLER (VIEW VALIDATION & CAPTCHA IN SINGLE CONTROLLER):


	public function aboutmethod(){
	
        // If captcha form is submitted
		
        if($this->input->post('submit')){
		
		
            $inputCaptcha = $this->input->post('captcha');
            $sessCaptcha = $this->session->userdata('captchaCode');
			
			// if match captcha data then go for validation
			
			
            if($inputCaptcha === $sessCaptcha){
		$config = array(

				array(
					'field' => 'text',
					'rules' => 'required',
					'errors' => array(
						'required' => 'You must provide a %s.',
						'min_length'=> 'min length not match',
						'regex_match'=> 'preg not match',
						'matches'=> 'not match with password field'
					),
				),

				array(
					'field' => 'password',
					'rules' => 'valid_email',
					'errors' => array(
						'valid_email' => 'not a email.',
					),
				)

				);


				$this->form_validation->set_rules($config);


				// if validation false then again create captcha


				if($this->form_validation->run() == FALSE){

					// Captcha configuration

				$config = array(
				    'img_path'      => './uploads/',
				    'img_url'       => base_url().'/uploads/',
				    'img_width'     => '150',
				    'img_height'    => 50,
				    'word_length'   => 8,
				    'font_size'     => 16
				);
				$captcha = create_captcha($config);

				$data['captchaImg'] = $captcha['image'];

				$this->load->view('pagename', $data);

				  }

				  // else insert data into database

				  else{

					$attr = array(

					   'name' => $this->input->post('text'),
					   'email' => $this->input->post('password'),
					   'select_name' => $this->input->post('select_name'),
					   'gender' => $this->input->post('gender'),
					   'vc_desc' => $this->input->post('vc_desc'),
					   'file ' => time().substr($_FILES['file']['name'],-4),

					);

						$this->load->model('insert_data');

						$result = $this->insert_data->insert_model($attr);
				  }
            		}
			
			// if captcha not match give a error
			
			
			else{
			
                echo 'Captcha code was not match, please try again.';
		
            }
        }
        
        // Captcha configuration for on load
		
        $config = array(
            'img_path'      => './uploads/',
            'img_url'       => base_url().'/uploads/',
            'img_width'     => '150',
            'img_height'    => 50,
            'word_length'   => 8,
            'font_size'     => 16
        );
		
        $captcha = create_captcha($config);
        
        // Unset previous captcha and store new captcha word
		
        $this->session->unset_userdata('captchaCode');
        $this->session->set_userdata('captchaCode',$captcha['word']);
        
        // Send captcha image to view
        $data['captchaImg'] = $captcha['image'];
        
        // Load the view
        $this->load->view('paename', $data);

    }





For More Change :->

 system / helpers / capcha_helpers.php

_______________________________________________



SESSION :



-> session
	
	create :
	
	$this->session->set_userdata("log","log_Value");

	view :
	
	$this->session->userdata('admin1');
	

-> FLASH SESSION DATA :

	flashdata available for the next request, and is then automatically cleared.

	-> Create :

 	$this->session->set_flashdata('flsh_msg', 'You have already.');
 	redirect('admin/product');  

 	-> Show :

 	<?php echo $this->session->flashdata('flsh_msg'); ?>




_______________________________________________


-> LOGIN :


Controller :



 try{
	$name = $this->input->post('name');

	$this->db->query("SELECT * FROM register WHERE name = '$name'");

  foreach ($query->result() as $row){

	if($row->name == $name && $row->email == $email && $row->select_name == 1){
		$this->session->set_userdata("admin1","$name");
		throw new Exception;
	}

   }

   $this->session->set_flashdata('error_login', 'login error');
   redirect('login.php');

}
catch(Exception $e){

	redirect('AdminController/home');

}





model :

 function login($username, $password)
 {
   $this -> db -> select('id, username, password');
   $this -> db -> from('table_name');
   $this -> db -> where('username', $username);
   $this -> db -> where('password', MD5($password));
   $this -> db -> limit(1);
 
   $query = $this -> db -> get();
 
   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
   
   
   
   
 -> Login Check in controller :
 
    class AdminController extends CI_CONTROLLER{

	public function __construct(){
	
            parent::__construct();
	    
            if(!$this->session->userdata('admin1')){
		$this->load->view('login.php');
	    }

        }
	
	public function home(){

		$this->load->view('admin.php');
		
	}

    }
    
  
  
  
 -> For Delete

    $this->session->unset_userdata('admin');







_______________________________________________



ACTIVE METHOD :


 // simple query :
 
$this->db->query("SELECT * FROM table_name WHERE username = '$username' AND password = '$password'");


 // active record :

*select ->

 $this->db->select();								// select all
 $this->db->select('database_fieldname,database_fieldname');			// select specific field select
 $this->db->where('database_fieldname'=>$input_field)				// select for edit
 $this->db->from('blogs');							// from table name


*update ->

 $this->db->where('id', $id);
 $this->db->update('mytable', $data); 

*delete ->

 $this->db->where('id', $id);
 $this->db->delete('mytable');
	   

*login ->

   $this -> db -> select('id, username, password');
   $this -> db -> from('table_name');
   $this -> db -> where('username', $username);
   $this -> db -> where('password', MD5($password));
   $this -> db -> limit(1);
   
   $query = $this -> db -> get();
 
 
 
  $this->db->join('comments', 'comments.id = blogs.id');







_______________________________________________


	

VIEW :


MODEL ->

class insert extends CI_MODEL{
	
	public function insert_model(){
		$query['y'] = $this->db->query('select * from product');	
		return $query;
	}
}	


Controller ->

public function index()
{
	$this->load->model('insert');
	$query = $this->insert->insert_model();

	$this->load->view('index',$query);
}
	

template->

<?php

   foreach ($q->result() as $row){
	
		echo $row->name;
		
   }
			
?>




SELECT FOR LOOP :

<?php $query = $this->db->query('select * from job'); ?>
    
<select>
<?php foreach ($query->result() as $row){ ?>

	<option><?php echo $row->name ?></option>

<?php } ?>
</select>
	
	
	
	
	

_______________________________________________


PAGINATION :


model ->

    public function record_count() {
        return $this->db->count_all("table_name");		// for count total row
    }
    
    
    public function method_name($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("table_name");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
   
   
   
controller ->


    public function example1() {
    
        $this->load->helper("url");
        $this->load->model("model_name");
        $this->load->library("pagination");
    
        $config = array();
        $config["base_url"] = base_url()."current_controller/current_method";    // set current url
        $config["total_rows"] = $this->model_name->record_count();               // return total number of rows
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;					         // segment is anypart after base url 

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;            // 3 is uri & 0 is initial point
	
        $data["results"] = $this->model_name->method_name($config["per_page"], $page);
	    
        $data["links"] = $this->pagination->create_links();		// create the link view

        $this->load->view("page_name", $data);
	
    }
	

VIEW :


<?php

   foreach($results as $data) {

       echo $data->field_name;

   }

?>

<?php echo $links; ?>
   
  
  
  
Confiqure With Bootstrap :

// all index are built in 

controller :

$config['page_query_string'] = TRUE;
$config['query_string_segment'] = 'page';
$config['full_tag_open'] = '<div class="pagination"><ul>';
$config['full_tag_close'] = '</ul></div><!--pagination-->';
$config['first_link'] = '&laquo; First';
$config['first_tag_open'] = '<li class="prev page">';
$config['first_tag_close'] = '</li>';
$config['last_link'] = 'Last &raquo;';
$config['last_tag_open'] = '<li class="next page">';
$config['last_tag_close'] = '</li>';
$config['next_link'] = 'Next &rarr;';
$config['next_tag_open'] = '<li class="next page">';
$config['next_tag_close'] = '</li>';
$config['prev_link'] = '&larr; Previous';
$config['prev_tag_open'] = '<li class="prev page">';
$config['prev_tag_close'] = '</li>';
$config['cur_tag_open'] = '<li class="active"><a href="">';
$config['cur_tag_close'] = '</a></li>';
$config['num_tag_open'] = '<li class="page">';
$config['num_tag_close'] = '</li>';
$config['anchor_class'] = 'follow_link';




view :


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

<style type="text/css">
ul li{
	list-style: none;
	float: left
}
ul li a{
	height:30px;
	width:30px;
	display: block;
	border: 1px solid #000
}
</style>

<?php

   foreach($results as $data) {

       echo $data->name;

   }

?>

<?php echo $links; ?>







_______________________________________________



EDIT :


* rules :

  1. create edit.php in views

  2. pass previous filename & id in input type hidden


* view :

  <a href="controller/method/id">Edit</a>

* Controller :

   public function edit($id){

	$q['y'] = $this->db->query("select * from register WHERE id='$id'");

	$this->load->view('edit.php',$q);

   }



* template->

	// text view 
	
	<?php foreach ($y->result() as $row){ ?>

	    echo $row->name;

	 <?php } ?>
	 
	 

	// dropdown view 
	
	<select name="country">

		<?php 

		$query2 = $this->db->query('select * from apps_countries');

		foreach ($query2->result() as $row2){ ?>

			<option <?php if($row->country == $row2->country_name){ echo " selected"; }?>>

				<?php echo $row2->country_name ?>

			</option>

		<?php } ?>

	</select>



       // checkbox radio 
       
       Male : <input type="radio" value="male" <?php if($row->gender == "male") echo "checked";  ?> />
       female : <input type="radio" value="female" <?php if($row->gender == "female") echo "checked";  ?> />



UPDATE :


// pass image & id for update

public function update(){

	  print_r($this->input->post());
	  print_r($_FILES);

	  $id = $this->input->post('id');
	  $old_img = $this->input->post('img');

	  $attr = array(

		'name' => $this->input->post('text'),

	   );
			  
          $this->db->where('id', $id);
	  $this->db->update('register', $attr);

				

	if(!empty($_FILES['file']['name'])){
	
	      $config['upload_path'] = 'uploads';
              $config['allowed_types'] = 'jpg|jpeg|png|gif';
	       // here file_name is fixed
	      $config['file_name'] = time().$_FILES['file']['name'];
	                
		//Load upload library and initialize configuration
		$this->load->library('upload',$config);
		$this->upload->initialize($config);
	                
		if($this->upload->do_upload('file')){
		    $uploadData = $this->upload->data();
		    // here file_name is fixed
	            $picture = $uploadData['file_name'];
		    
		    unlink('uploads/'.$old_img);
		    
		}
	     } 
			     
				   
	}


DELETE :


$this->db->delete('mytable', array('id' => $id)); 


_______________________________________________




** ADD TO CART :

<a href="addtocart/insert/<?php echo $row->id;  ?>">ADD TO CART</a>





** controller :


	public function insert($id)
	{

		$query= $this->db->query("select * from product Where id='$id'");

		foreach ($query->result() as $row){

			$data = array(
			        'id'      => $row->id,
			        'qty'     => 1,
			        'price'   => $row->price,
			        'name'    => $row->name
			);

			$this->cart->insert($data);
			print_r($data);
			
	   }


	}
	
	
	function update_cart(){

		$this->cart->update($_POST);
	}





** Login :
   
   
session_start();
$_SESSION['admin'] = $_POST['name'];
header("location:../Welcome/Admin"); 


Controller :


public function Admin()
{
	$this->load->view('admin.php'); 

}


View :

<?php

	print_r($_SESSION);
	if(!isset($_SESSION['admin'])){
		echo "session not found";
	}else{
		echo "session found";
	}

?>

<h1>admin</h1>


_________________________________________________


MAIL LIBRARY :

$this->load->library('email');

$from = "armanhakimsagar@gmail.com";
$receiver = "armanhakimsagar@gmail.com";
$subject = "ulala ";
$message = "<h2> u la </h2>";
//config email settings
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com';
        $config['smtp_port'] = '465';
        $config['smtp_user'] = $from;
        $config['smtp_pass'] = '';  go to this link generate password : https://support.google.com/accounts/answer/185833?hl=enturn on 2-Step-Verification || Visit your App passwords page & create apps
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = 'TRUE';
        $config['newline'] = "\r\n"; 
        
        $this->email->initialize($config);
        
        
//send email
        $this->email->from($from);
        $this->email->to($receiver);
        $this->email->subject($subject);
        $this->email->message($message);
        
        $this->email->send();




_________________________________________________



-> AJAX


** comment.php :


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">
    
function post()
{
  var comment = document.getElementById("comment").value;
  var name = document.getElementById("username").value;
  if(comment && name)
  {
    $.ajax
    ({
      type: 'post',
      url: 'commentController/insert',
      data: 
      {
         user_comm:comment,
	       user_name:name
      },
      success: function (response) 
      {
	    document.getElementById("all_comments").innerHTML=response+document.getElementById("all_comments").innerHTML;
	    document.getElementById("comment").value="";
            document.getElementById("username").value="";
  
      }
    });
  }
  
  return false;
}
</script>



  <form method='post' onSubmit="return post();">
  <textarea id="comment" placeholder="Write Your Comment Here....."></textarea>
  <br>
  <input type="text" id="username" placeholder="Your Name">
  <br>
  <input type="submit" value="Post Comment">
  </form>



  <div id="all_comments">
      
      
  <!-- onload view comments -->


      
  <?php

    $query = $this->db->query('select * from comments');

    foreach ($query->result() as $row){
  
        $name= $row->name;
        $comment=$row->comment;
        $time=$row->post_time;
    
      }

   ?>

   <!-- onload view comments -->
   
    <div class="comment_div"> 
      <p class="name">Posted By:<?php echo $name;?></p>
      <p class="comment"><?php echo $comment;?></p> 
      <p class="time"><?php echo $time;?></p>
    </div>
      

      
  </div>






** commentController :


  public function insert(){

     $this->load->view('post_comment.php');

  }





** post_comments.php :



<?php


if(isset($_POST['user_comm']) && isset($_POST['user_name'])){

  $name = $_POST['user_name'];
  $comment = $_POST['user_comm'];


  $attr = array(

     'name' => $this->input->post('user_name'),
     'comment' => $this->input->post('user_comm')

  );


  $id = $this->db->insert('comments',$attr);

    
  // after insert select all data by mysqli insert id, it will hold by response param
    
  $id =$this->db->insert_id();


  $q = $this->db->query("select name,comment,post_time from comments where name='$name' and comment='$comment' and id='$id'");


   foreach ($q->result() as $row){
  
      $name=$row->name;
      $comment=$row->comment;
      $time=$row->post_time;
    
   }

  ?>


   <div class="comment_div"> 
   
    <p class="name">Posted By:<?php echo $name; ?></p>
    <p class="comment"><?php echo $comment; ?></p>	
    <p class="time"><?php echo $time; ?></p>
   
   </div>


<?php } ?>
