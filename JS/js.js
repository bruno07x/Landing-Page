$("#count")
  .countdown("2018/01/01", function(event) {
    $(this).text(
      event.strftime('%D days %H:%M:%S')
    );
  });