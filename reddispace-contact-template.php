<?php
/*
Template Name: Reddispace Contact
*/
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if ($_POST["name"] == ""  && $_POST["phone"] == "" ) {
    $headers = array("Content-Type:multipart/form-data");
    $post_data = array(
      'Name_First' => $_POST["Name_First"], 
      'Name_Last' => $_POST["Name_Last"], 
      'SingleLine' => $_POST["SingleLine"], 
      'SingleLine2' => $_POST["SingleLine2"], 
      'PhoneNumber_countrycodeval' => "+1", 
      'PhoneNumber_countrycode' => $_POST["PhoneNumber_countrycode"], 
      'Dropdown' => "Landing Page", 
      'Dropdown1' => "Office Pods", 
      'SingleLine1' => "1", 
      'Email' => $_POST["Email"]);

    $post_data1 = array(
      'Name_First' => "B1", 
      'Name_Last' => "B2", 
      'SingleLine' => "B3", 
      'PhoneNumber_countrycodeval' => "+1", 
      'PhoneNumber_countrycode' => "666-555-5555", 
      'Dropdown' => "Landing Page", 
      'Dropdown1' => "Office Pods", 
      'SingleLine1' => "1", 
      'Email' => "john.doe@gmail.com");
  
    $post_data2 = array(
      'Name_First' => "C1", 
      'Name_Last' => "C2", 
      'SingleLine' => "C3", 
      'SingleLine1' => "C4", 
      'SingleLine2' => "C5");
  
    // $post_data = array('Name_First' => '11', 'Name_Last' => '22');
    $url = "https://forms.zohopublic.com/friantassociates/form/ContactUsRS/formperma/dfNrQIRFkUpTYDKPlISLrHsfyejVvhRGMpB3ymtADX0/htmlRecords/submit";
    // $url = "https://forms.zohopublic.com/friantassociates/form/FriantPlusContact/formperma/fy-BvDiGb5q2Um6bZe1rlmCpAdXzoD2OJHd4NneN_ps/htmlRecords/submit";
    // $url = "https://forms.zohopublic.com/friantassociates/form/FriantReddispace/formperma/9vsJufU-gyFV6cDf8fWknTHl7JRm9wq0157k_T9T-M8/htmlRecords/submit";
    
    if ($_POST["Name_First"] != "" && $_POST["Name_Last"] != "" && $_POST["Email"] != "") {
      $ch = curl_init($url);
      // curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);

      // return the response instead of sending it to stdout:
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      // set the POST data, corresponding method and headers:
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));
      // send the request and get the response
      $server_output = curl_exec($ch);

      var_dump($server_output);
      var_dump($post_data);
      echo "submitted";      
    }
  }
} else {

  get_header();
  $is_page_builder_used = et_pb_is_pagebuilder_used(get_the_ID());
  $show_navigation = get_post_meta(get_the_ID(), '_et_pb_project_nav', true);
?>
<div id="main-content">
<div class="wrapper__text">
  <h1 class="text__title">Where Focus Finds its Place</h1>

  <h2>Fríant office pods are designed for today's open workplaces supporting focus, privacy, and collaboration with thoughtful engineering and flexible design. </h2>
</div>

<img src="https://friant.com/wp-content/uploads/2026/01/Reddispace-collection-hero-3-oak.webp" class="img__hero"/>

<div class="wrapper__text">
  <p>If you're ready to talk through your project, you can connect directly with a local sales representative. If you're still evaluating options, you can share your details and we'll follow up with the information you need to move forward. </p>

  <p class="wrapper__buttons">
    <a href="https://friant.com/california" class="btn btn__connect">Connect with a Local Sales Rep</a>
    <a href="https://friant.com/officepods/" class="btn btn__collection">Go to Collection page</a>
  </p>


</div>
<div class="wrapper__form form-zoho active">
  <form name='form' id='form' class="form__reddispace-contact "method='POST' accept-charset='UTF-8' enctype='multipart/form-data' class="form form-zoho active">
    <p class="text__get-more active">Get more information delivered to your inbox. </p>
    <input type="hidden" name="zf_referrer_name" value=""><!-- To Track referrals , place the referrer name within the " " in the above hidden input field -->
    <input type="hidden" name="zf_redirect_url" value=""><!-- To redirect to a specific page after record submission , place the respective url within the " " in the above hidden input field -->
    <input type="hidden" name="zc_gad" value=""><!-- If GCLID is enabled in Zoho CRM Integration, click details of AdWords Ads will be pushed to Zoho CRM -->

    <input type="text" name="name" value="" />
    <input type="text" name="phone" value="" />

    <input type="text" class="input__text" maxlength="255" name="Name_First" fieldType=7 placeholder="First Name" />
    <input type="text" class="input__text" maxlength="255" name="Name_Last" fieldType=7 placeholder="Last Name" />
    <input  type="text" class="input__text" name="SingleLine2" value="" fieldType=1 maxlength="255" placeholder="Title" />
    <input  type="text" class="input__text" name="SingleLine" value="" fieldType=1 maxlength="255" placeholder="Company" />
    <input  type="text" class="input__text" name="PhoneNumber_countrycode" value="" fieldType=1 maxlength="255" placeholder="Phone" />
    <input  type="text" class="input__text" name="Email" value="" fieldType=1 maxlength="255" placeholder="Email" />
    <button type="button" class="btn btn__submit">Send Me Office Pod Info</button>
    <img src="https://friant.com/wp-content/uploads/2019/06/Rolling-1s-200px.gif" class="img__loading"/>
  </form>
  <img src="https://friant.com/wp-content/uploads/2026/01/Reddispace-oak-sideimage.webp" class="img__form"/>
</div>
  

<div class="form-success">Thank you! We'll get back to you soon.</div>


</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll('.btn__submit').forEach(btn => {
    btn.addEventListener('click', submitForm);
  });
}); 

function submitForm(e){
  const text_get_more = document.querySelector('.text__get-more');
  const form_wrapper = document.querySelector('.wrapper__form');
  const form = this.closest('.form__reddispace-contact');
  const formUrl = "/officepods-contact";
  const formIsValid = [...form.querySelectorAll('input, textarea')].every(input => {
    return input.checkValidity();
  });
  
  if (formIsValid) {
    let formData = new FormData(form);
    document.querySelector(".img__loading").classList.add('active');
    fetch(formUrl, {
      method: form.getAttribute('method'),
      body: formData
    }).then(res=>res.text()).then(function (data) {
      nextStep = document.querySelector(".form-success");
      text_get_more.classList.remove('active');
      form_wrapper.classList.remove('active');
      if (nextStep) {
        nextStep.classList.add('active');
      }
    });
  }
  e.preventDefault();
}
</script>

<?php get_footer(); ?>

<?php } ?>
