<div class="comments" id="myComments">
    <h2>Kommentarer</h2>
    
<?php if($this->session->userdata('logged_in')) : ?>
    
    <form action="<?php echo base_url(); ?>recipes/create" method="POST">  
        <textarea name="message"></textarea>
            
     <button type="submit">Kommentera</button>
    </form>
<?php endif; ?>
    
<div id="kommentarer"></div>
    
</div> 
    
<script>
  $(document).ready(function(){
  function commentEvent(target){
  target.on('submit', function(e) {
      
    e.preventDefault();
    var that = $(this),
    url = that.attr('action'),
    type = that.attr('method'),
    data = {};
      
    // Fetches all the data from the forms parts that has a name attribute and saves them.
    that.find('[name]').each(function(index, value) {
      var that = $(this),
      name = that.attr('name'),
      value = that.val();
      data[name] = value;
    });
      
      
    // Send data to the targeted function to handle it.
    $.ajax({
      url: url,
      type: type,
      data: data,
      success: function(response) {
        $(that)[0].reset();
        showComments();
      }
    });
  });
  return false;
};
// Add first event listerner
commentEvent($('form'));
      
function showComments(e){
  $.ajax({
    type: 'ajax',
    url: "<?php echo base_url();?>recipes/retrive",
    async: true,
    dataType: 'json',
    success: function(result){
        
                var output = '';
                var i;
                for(i = 0; i< result.length; i++) {
                      
                    output += '<div class="comment-box" ><div class="comment-box-p">'
                        + result[i].name + '<br>'
                        + result[i].created_at + '<br>'
                        + result[i].message
                        + '</div>'
                        + '<div class="delete-form">';
                        if('<?php echo $this->session->userdata('user_id'); ?>' == result[i].user_id){
                            output += '<form action ="<?php echo base_url(); ?>recipes/delete/'
                                + result[i].id + '"'
                                + 'method="POST"><button type="submit" class="delete-form-button">Radera</button></form>';
                        }
                    output += '</div></div>';

                }
                $('#kommentarer').html(output); 
      // Add event listerner to the new comments.
      commentEvent($('#kommentarer form'));
    },
    error: function(){
      alert('could not get data from database');
    }
  })
  return false;
};
      
showComments();
});
      
  </script>  