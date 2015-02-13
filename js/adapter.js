
var adapter = {

   searchType : '',
   education : '',
   sector : '',

   btnListener : function(){
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
       * Button setter for education
       */
      $('.btn-education').click(function(){
         adapter.education = stringFix($(this).text());
      });

      $('.dropdown').change(function(){
         adapter.sector = $(this).val();
      });
   },

   createJson : function(){
      return JSON.stringify({
         'searchType' : this.searchType,
         'education' : this.education,
         'sector' : this.sector
      });
   }


};