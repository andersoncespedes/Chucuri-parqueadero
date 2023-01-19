(function(){

  $(document).ready(function() {
  let Table = $('table').dataTable( {
      paginate: true,
      } ) 
      Table.$('td:even').css('backgroundColor', '#ff0047',).css('color', 'white');  
  });
})();