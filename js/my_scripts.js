$(document).ready(function(){
  $("textarea").keyup(function(e) {
    while($(this).outerHeight() < this.scrollHeight + parseFloat($(this).css("borderTopWidth")) + parseFloat($(this).css("borderBottomWidth"))) {
        $(this).height($(this).height()+1);
    };
  });
});

function expandVideo(video_id){
  element = document.getElementById(video_id);
  element.webkitRequestFullScreen();
}

function choose_category_for_new_note(category, category_id){
  $("#new-note-category-input-field").val(category);
  $(".new-note-category-labels-holder .new-note-category-label").css("backgroundColor", "#17a2b8");
  $(".category-" + category_id).css("backgroundColor", "#0b7686");
}

function change_nav(){
  if($('#primary-nav').css("display") == "none"){
    $('#primary-nav').css("display","flex");
    $('#secondary-nav').css("display","none");
    $('#third-nav').css("display", "none");
  }
  else{
    $('#primary-nav').css("display","none");
    $('#secondary-nav').css("display","flex");
    $('#third-nav').css("display","flex");
  }
}

function remove_meal(food_id, element_num){
  $.ajax({
    url: 'remove_food_from_bulking_days.php',
    type: 'POST',
    data: {food_id: food_id}
  })
      .done(function(result){
          $("#food_eaten_item_" + element_num).hide();
          $.ajax({
            url: 'get-macros.php',
            type: 'POST',
          })
              .done(function(result){
                $('.food-macros-container').html(result);
              })
              .fail(function(){
              });
      })
      .fail(function(){
          console.log("error with ajax request");
      });
}

function add_meal(food_id){
  $.ajax({
    url: 'enter_food_in_bulking_days.php',
    type: 'POST',
    data: {food_id: food_id}
  })
      .done(function(result){
          if(result != "error"){
            template = `<div class="food_eaten_item">
              <span>` + result + `</span>
              <button type="button" class="close float-right" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>`;
            $(".eaten-today-food").append(template);

            $.ajax({
              url: 'get-macros.php',
              type: 'POST',
            })
                .done(function(result){
                  $('.food-macros-container').html(result);
                })
                .fail(function(){
                });
          }
          else{
            alert('error adding new meal');
          }
      })
      .fail(function(){
          alert("error with ajax request");
      });
}

function remove_note(id){
  $.ajax({
    url: 'remove_note.php',
    type: 'POST',
    data: {note_id: id}
  })
      .done(function(result){
          $("#note-" + id).hide();
      })
      .fail(function(){
          alert("error with ajax request");
      });
}

function remove_reminder(id){
  $.ajax({
    url: 'remove_reminder.php',
    type: 'POST',
    data: {reminder_id: id}
  })
      .done(function(result){
          console.log(result);
          $("#reminder-" + id).hide();
      })
      .fail(function(){
          console.log("error with ajax request");
      });
}

function remove_reminder_uni(id){
  $.ajax({
    url: 'remove_reminder_uni.php',
    type: 'POST',
    data: {reminder_id: id}
  })
      .done(function(result){
          console.log(result);
          $("#reminder-" + id).hide();
      })
      .fail(function(){
          console.log("error with ajax request");
      });
}

$('.quick-note-trigger').click(function(){
    $('.quick-note-holder').toggle();
});

$('.quick-note-btn').click(function(){
  var quick_note_title = $('#quick_note_title').val();
  var quick_note_category = $('#quick_note_category').val();
  var quick_note_content = $('#quick_note_content').val();
  $.ajax({
    url: 'enter-quick-note.php',
    type: 'POST',
    data: {title: quick_note_title, category: quick_note_category, content: quick_note_content}
  })
      .done(function(result){
          if(result != "error"){
            $('#quick_note_title').val("");
            $('#quick_note_category').val("");
            $('#quick_note_content').val("");

            // moga da sloja transition na butona da stava zelen pri sucess ili nqkva qka animaciika oshte po dobre
          }
          else{
            alert("error");
          }
      })
      .fail(function(){
        alert("error");
      });
});

// Entering fullscreen mode
$('video').bind('webkitfullscreenchange mozfullscreenchange fullscreenchange', function(e) {
    var state = document.fullScreen || document.mozFullScreen || document.webkitIsFullScreen;
    var event = state ? 'on' : 'off';

    if(event == 'off') element.pause();

    $('#bigImgModal').modal('hide');
});

function f11(){
  var el = document.documentElement
  , rfs = // for newer Webkit and Firefox
       el.requestFullscreen
    || el.webkitRequestFullScreen
    || el.mozRequestFullScreen
    || el.msRequestFullscreen
  ;
  if(typeof rfs!="undefined" && rfs){
    rfs.call(el);
  } else if(typeof window.ActiveXObject!="undefined"){
    // for Internet Explorer
    var wscript = new ActiveXObject("WScript.Shell");
    if (wscript!=null) {
       wscript.SendKeys("{F11}");
    }
  }
}

$(window).on('load', function(){
  $(".card-columns").css("visibility", "visible");
});

$(document).ready(function(){
  $('#bigImgModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var imgSrc = button.data('img-src') // Extract info from data-* attributes
    var modal = $(this)
    $("#my_image").attr("src","second.jpg");
    modal.find('.modal-img').attr('src', imgSrc)
  })

  $('.mobile-menu-icon').click(function(){
    $('.mobile-menu').show();
  });

  $('.close-mobile-menu').click(function(){
    $('.mobile-menu').hide();
  });

  $(".modal").click(function(){
    $('#bigImgModal').modal('hide');
  });

  $('input[name="creatine-checkbox"]').change(function() {
    if(this.checked) {
      $.ajax({
        url: 'add-creatine-for-today-script.php',
        type: 'POST',
      })
          .done(function(result){
          })
          .fail(function(){
              alert('error with adding creatine intake');
          });
    }
  });

});
