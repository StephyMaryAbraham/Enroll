 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Resume</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        
                      <!--   <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>                          
                            <li class="active">Resumes</li>
                        </ol> -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- .row -->


<?php if($this->session->flashdata('msg')){
  $errormessage=$this->session->flashdata('msg');
  echo $errormessage;
}
?>

     <div class="row">
        
                    <div class="col-md-12">
                        <div class="white-box">
<?php if(!empty($r)) { ?>
<?php foreach($r as $resume){ ?>

                                <div class="row">
                                    <div class="col-sm-2"><b>Title :</b></div>
                                        <div class="col-sm-10"><?php echo $resume->resume_title;?></div>
                                    <!-- <div class="col-sm-2">
                                     <a data-fancybox data-type="iframe" data-src="<?php echo base_url('resources/resume/'.$resume->resume);?>" data-caption="<?php echo $resume->resume_description;?>" href="javascript:;" class="btn btn-info">Open                        </a> </div> -->

                                </div> 
                                <br>
                                <div class="row">
                                    <div class="col-sm-2"><b>Description : </b></div>
                                    <div class="col-sm-8"><?php echo $resume->resume_description;?> </div>
                                    <div class="col-sm-2">
                                     <a data-fancybox data-type="iframe" data-src="<?php echo base_url('resources/resume/'.$resume->resume);?>" data-caption="<?php echo $resume->resume_description;?>" href="javascript:;" class="btn btn-info">Open                        </a> </div>

                                </div> 
                                <div class="row">
                                    <div class="col-sm-2"> <b> Last Update :</b></div>
                                        <div class="col-sm-10">
                                            <?php 
                                                $seconds_ago = (time() - strtotime($resume->date));

                                                if ($seconds_ago >= 31536000) {
                                                    echo  intval($seconds_ago / 31536000) . " years ago";
                                                } elseif ($seconds_ago >= 2419200) {
                                                    echo  intval($seconds_ago / 2419200) . " months ago";
                                                } elseif ($seconds_ago >= 86400) {
                                                    echo intval($seconds_ago / 86400) . " days ago";
                                                } elseif ($seconds_ago >= 3600) {
                                                    echo  intval($seconds_ago / 3600) . " hours ago";
                                                } elseif ($seconds_ago >= 60) {
                                                    echo  intval($seconds_ago / 60) . " minutes ago";
                                                } else {
                                                    echo "Uploaded less than a minute ago";
                                                }

                                             ?>

                                              <?php } ?>
                                        </div>
                                </div>
                                <?php } else{ ?>

<span class="text-center"><h2 style="display: inline;">Please upload resume</h2></span>
                                    <?php } ?>
                        </div>
                    </div>
                   
                </div>

                       

              
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                             
                            <form action="resume_submit" method="post" enctype="multipart/form-data" class="form">
                                
                                    <div class="row">

                                <div class="form-group col-sm-6">
                                 <label class="control-label">Title :</label> <input type="text" name="resume_title" class="form-control" required> 
                             </div>
                                 
                                  <div class="form-group col-sm-6">
                                 <label class="control-label">Description :</label>
                                  <!-- <textarea name="resume_description"  required></textarea> -->
                    <input type="text" name="resume_description" class="form-control" required  > 
                                </div>
                                    </div>


                                    <div class="row">
                                <div class="form-group col-sm-6" id="fup">
                                <input type="file" name="resume" class="form-control" id="resumesupload" accept=".pdf,.doc,.docx,.pdf,.odt" required>
                                
                              <div class="text-muted"><label>  <span id="errorupload">Allowed File types <span class="text-dark">.pdf</span>, <span class="text-dark">.doc</span> , <span class="text-dark">.docx</span> , <span class="text-dark">.pdf </span>, <span class="text-dark">.odt</span></span></label></div>
                            </div>
                        <div class="form-group col-sm-6">
                                <input type="submit" value="Upload" id="uploadnow" class="btn btn-success">
                                    </div>
                                </div>


                            
                                


                            </form>







                        </div>
                    </div>
                </div>


                

                <?php 
$this->load->view('usernew/includes/footer');
$this->load->view('usernew/includes/footerautoselecturl');
                 ?>

 <script>
                    $(document).ready(function(){
                           // alert("sdsd");
                    $('#resumesupload').change(
                function () {
                    var fileExtension = ['pdf','doc','docx', 'pdf' , 'odt'];
                    if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                       // alert("Only .pdf, .doc, .docx, .pdf, .odt formats are allowed.");
                        $("#errorupload").html("<span class='text-danger font-weight-bold'>Please choose .pdf, .doc, .docx, .pdf, .odt , format files </span>");
                        $("#fup").removeClass("has-success has-feedback");
                         $("#fup").addClass("has-error has-feedback"); 
                        $("#uploadnow").prop( "disabled", true );
                        return false; }
                        else{
                            var file_size = $('#resumesupload')[0].files[0].size;
                    if(file_size>2097152) {   
                     $("#fup").removeClass("has-success has-feedback");        
                     $("#fup").addClass("has-error has-feedback");            
                         $("#errorupload").html("<span class='text-danger font-weight-bold'>File size is greater than 2MB</span>");
                        $("#resumesupload").css("border-color","2px solid red");
                       
                        return false;
                    } else{
                        $("#fup").removeClass("has-error has-feedback");
                        $("#fup").addClass("has-success has-feedback");
                        $("#errorupload").html(" ");
                         $("#resumesupload").css("border-color","solid green");
                            $("#uploadnow").prop( "disabled", false );
                             }

                        }
});
                    
                    $("#uploadnow").click(function(){
                            

                    });
                 });
                </script>
               