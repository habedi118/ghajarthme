
<!-- start single product part  -->
<section class="container-fluid d-flex flex-column flex-md-row justify-content-between bg-3 mt-3">

  <div class="col-12 col-md-5">

    <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-fluid" alt="">

  </div>
  <div class="col-12 col-md-7 align-self-center text-right">

    <h3>
          <?php the_title(); ?>
    </h3>
    <h4>
          شماره تماس
    </h4>
    <div>
        <?php the_content(); ?>
    </div>


  </div>

</section>
<!--  end single product part -->
<?php

    $post_all_meta = get_post_meta(get_the_ID());
    $post_meta_key = array_keys($post_all_meta);
    $wanted_meta_keys=preg_grep('/option.*/',$post_meta_key);

    ?>

    <div class="container-fluid px-2 mt-2 border">
      <ul class="nav nav-tabs">
          <li class="nav-item">
            <button class="nav-link active ha-btn hover-bg-1" target="ditails" onclick="changeTab(this)">مشخصات فنی</button>
          </li>
          <li class="nav-item">
            <button class="nav-link ha-btn hover-bg-1" target="discription" onclick="changeTab(this)">توضیحات</button>
          </li>
          <li class="nav-item">
            <button class="nav-link ha-btn hover-bg-1" target="comment" onclick="changeTab(this)" >نظرات کاربران</button>
          </li>

    </ul>
    <div class="pt-4  " id="ditails" role="tabContent">
      <table class="table table-hover dir-rtl text-right">
<thead>
  <tr>
    <th scope="col">مشخصات</th>
    <th scope="col"></th>
  </tr>
</thead>
<tbody>

    <?php foreach($wanted_meta_keys as $key):

        $meta_value = get_post_meta(get_the_ID(),$key,true);
        $print_key = preg_replace("/option/"," ",$key);


        ?>
    <tr>
        <th scope="row"><?php echo $print_key ?></th>
        <td><?php echo $meta_value ?></td>
    </tr>
    <?php endforeach; ?>



</tbody>
</table>
    </div>
    <div class="pt-4 text-right" id="discription" role="tabContent">
        <h4><?php the_title() ?></h4>
        <article class="pt-2">
            <?php the_content(); ?>
        </article>

    </div>
    <div class="pt-4" id="comment" role="tabContent">

    <?php
    $comments = get_comments('post_id='.get_the_ID());
    foreach($comments as $comment) :
      ?>
      <div class="alert alert-secondary text-right container" role="alert">

          <p class=""><?php echo($comment->comment_content); ?></p>
          <hr class="pb-0 mb-0">
          <p class="mb-0 pt-0 fsm"><?php echo($comment->comment_date); ?></p>
      </div>


      <?php
    endforeach;

     ?>

    </div>

    </div>
    <style media="screen">
      [role="tabContent"]{
        display: none;
      }
      .active-tab{
        display: block;
      }
      .active{
          border-top:2px solid var(--color8)!important;
      }
      .active:focus{
        outline:none !important;
      }

    </style>
    <script type="text/javascript">

      $(document).ready(function(){

        var target = $(".nav-tabs").find(".active").attr("target");
        console.log(target);
        $("#"+target).addClass("active-tab");

      });


        function changeTab(input){
          var activetarget =$(input).parents(".nav-tabs").find(".active");
          $(activetarget).removeClass("active");
          var  activetargetid=$(activetarget).attr("target");
          console.log(activetargetid);
          $("#"+activetargetid).removeClass("active-tab");
          $(input).addClass("active");
          var target = $(input).attr("target");
          $("#"+target).addClass("active-tab");

        }

    </script>
