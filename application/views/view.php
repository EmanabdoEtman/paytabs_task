 
<section id="inner-headline">
  <div class="container">
    <div class="row">
      <div class="span4">
        <div class="inner-heading">
          <h2>Categories</h2>
        </div>
      </div>
      <div class="span8">
        <ul class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li> 
          <li class="active">Categories</li>
        </ul>
      </div>
    </div>
  </div>
</section>
<section id="content" >
  <div class="container"  style="min-height: 300px; ">
    <div class="row marginbot30">
      <div class="span12">
       <div class="span9"> <h4 class="heading" ><strong>Categories</strong>  <span></span></h4> </div>
       <div class="span2"><button type="button" class="btn btn-danger " onclick="add_form(0)"   title="Add main category">Add main category</button> 
 

</div>
          
          <div class="table-responsive shopping-cart">
            <div  class="span12" id="message"> 
          </div>
            <table   class="table table-striped table-bordered dt-responsive nowrap" id="categories-data-table" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
              <thead>
                <tr>
                 <th>   Category Title </th>
                 <th>   Main Category </th> 
                 <th>   Add Sub category </th>  

               </tr>
             </thead>
             <tbody>

             </tbody>
           </table>
         </div> 
       </div>
     </div>
   </div>
 </section> 


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
 <script src="<?php echo base_url(); ?>template/js/categories.js"></script>    
 <script src="<?php echo base_url(); ?>template/js/jquery-confirm.js"></script>  
 <script type="text/javascript"> 
  var base_url = "<?php echo base_url(); ?>"; 
</script> 



