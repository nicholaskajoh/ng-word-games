
   jQuery(document).ready(function($) {
     $('form#custom-quiz-form').on('submit', function(e) {
        // e.preventDefault();
        alert('12346345');
         var answers = [];
        $('input[name="answer"]').each(function() {
            answers.push($(this).val());
        });

         $.ajax({
          url: admin - ajax.php,  
          type: "POST",
          data: {
            action: "custom_quiz_process_submission",
            answers: answers,
          },
          success: function (response) {
             $("#quiz-score").html(response);
          },
          error: function (xhr, status, error) {
            console.error(error);
          },
        });
    });
});

 