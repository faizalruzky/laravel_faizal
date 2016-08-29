$('.article_link').click(function(e){
      e.preventDefault();
      $.ajax({
        url: '/articles',
        type:'GET',
        dataType: 'json',

        success: function (data)
        {
          console.log(data);
          $('.panel-body').append(data);
        },

        error: function (xhr, status)
        {
          console.log(xhr.error);
        }
      });

  });
