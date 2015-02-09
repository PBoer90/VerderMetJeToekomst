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

/**
 * Button setter  for MBO
 */
$('#btn-MBO').click(function(){
   adapter.sector = 'MBO';
});

/**
 * Button setter  for HBO
 */
$('#btn-HBO').click(function(){
   adapter.sector = 'HBO';
});

/**
 * Button setter  for VMBO
 */
$('#btn-VMBO').click(function(){
   adapter.sector = 'VMBO';
});

