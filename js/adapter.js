var adapter = {};

/**
 * Button setter for work
 */
$('#btn-work').click(function(){
   adapter.searchType = 'work';
});

/**
 * Button setter for internship
 */
$('#btn-internship').click(function(){
   adapter.searchType = 'internship';
});