/**
 * @file
 * A JavaScript file for the theme.
 *
 */


(function($) {


  Drupal.behaviors.drupaldelphia = {
    attach: function(context, settings) {
      // Adds Classes to body and mobile-handle when clicked.
      $(function() {
        $(document).on('click', '.mobile-handle', function() {
          $('body').toggleClass('slide');
          $(this).toggleClass('on');
          event.preventDefault();
        });
      });
      $('select')
        .wrap('<div class="input-wrap" />')
        .after('<span class="select" />');
      // Makes nav bar stick to top when scrolling
      function sticky_relocate() {
        var window_top = $(window).scrollTop();
        if ($('#navbar-administration').length) {
          $('body').addClass('nav-stick');
          window_top += 16;
        }
        var logo_top = $('#header').offset().top;
        logo_top += 26;
        //console.log("window_top: " + window_top);
        //console.log("logo_top: " + logo_top);
        if (window_top > 0) {
          $('#header').addClass('stick');
        } else {
          $('#header').removeClass('stick');
        }
      }
      $(function() {
        $(window).scroll(sticky_relocate);
        sticky_relocate();
      });
    }
  };


/* sponsor workflow block active states */
  Drupal.behaviors.sponsor = {
    attach: function(context, settings) {
      $(function() {

        if($('body').hasClass('front')) {
          Cookies.remove('sponsorWorkflow');                               
        }

        if($('body').hasClass('page-sponsor')) {
          if($('body').hasClass('not-logged-in')) {
            $('.workflow-sponsorship').find('ol').find('li:nth-child(1)').addClass('active');
            $('.workflow-sponsorship').find('ol').find('li:nth-child(2)').addClass('next');
          } 
          if($('body').hasClass('logged-in')) {
            $('.workflow-sponsorship').find('ol').find('li:nth-child(2)').addClass('prev');
            $('.workflow-sponsorship').find('ol').find('li:nth-child(3)').addClass('active');
            $('.workflow-sponsorship').find('ol').find('li:nth-child(4)').addClass('next');          
          }
          Cookies.set('sponsorWorkflow', true, {expires: 1});
          sponsorWorkflow = Cookies.get('sponsorWorkflow');
        }

        if( $('body').hasClass('section-user') || $('body').hasClass('section-users') ) {
          sponsorWorkflow = Cookies.get('sponsorWorkflow');
          if(sponsorWorkflow=='true') {
            $('.workflow-sponsorship').find('ol').find('li:nth-child(1)').addClass('prev');
            $('.workflow-sponsorship').find('ol').find('li:nth-child(2)').addClass('active');
            $('.workflow-sponsorship').find('ol').find('li:nth-child(3)').addClass('next');
            $('.workflow-sponsorship').show();
          } 
        }


        if($('body').hasClass('page-node-add-sponsor')) {
          $('.workflow-sponsorship').find('ol').find('li:nth-child(3)').addClass('prev');
          $('.workflow-sponsorship').find('ol').find('li:nth-child(4)').addClass('active');
          $('.workflow-sponsorship').find('ol').find('li:nth-child(5)').addClass('next');                    
          $('.workflow-sponsorship').find('ol').find('li:nth-child(2)').remove();          
          $('.workflow-sponsorship').find('ol').find('li:nth-child(1)').remove();          
          $('.workflow-sponsorship').children('ol').attr('start',3);
        }

        if($('body').hasClass('page-checkout')) {
          sponsorWorkflow = Cookies.get('sponsorWorkflow');

          var currentPage = window.location.href;
          var isNumeric = /^[-+]?(\d+|\d+\.\d*|\d*\.\d+)$/;
          
          if(!$('body').hasClass('page-checkout-checkout') && isNumeric.test(currentPage.slice(-1))) {
            if(sponsorWorkflow=='true') {
              $('.workflow-sponsorship').find('ol').find('li:nth-child(4)').addClass('prev');
              $('.workflow-sponsorship').find('ol').find('li:nth-child(5)').addClass('active');
              $('.workflow-sponsorship').find('ol').find('li:nth-child(6)').addClass('next');                    
              $('.workflow-sponsorship').find('ol').find('li:nth-child(3)').remove();          
              $('.workflow-sponsorship').find('ol').find('li:nth-child(2)').remove();          
              $('.workflow-sponsorship').find('ol').find('li:nth-child(1)').remove();
              $('.workflow-sponsorship').children('ol').attr('start',4);
              $('.workflow-sponsorship').show();
            }
          }

          if($('body').hasClass('page-checkout') && $('body').hasClass('page-checkout-checkout')) {
            if(sponsorWorkflow=='true') {
              $('.workflow-sponsorship').find('ol').find('li:nth-child(5)').addClass('prev');
              $('.workflow-sponsorship').find('ol').find('li:nth-child(6)').addClass('active');
              $('.workflow-sponsorship').find('ol').find('li:nth-child(7)').addClass('next');                                
              $('.workflow-sponsorship').find('ol').find('li:nth-child(4)').remove();          
              $('.workflow-sponsorship').find('ol').find('li:nth-child(3)').remove();          
              $('.workflow-sponsorship').find('ol').find('li:nth-child(2)').remove();          
              $('.workflow-sponsorship').find('ol').find('li:nth-child(1)').remove();          
              $('.workflow-sponsorship').children('ol').attr('start',5);
              $('.workflow-sponsorship').show();
            }
          }

          if($('body').hasClass('page-checkout') && $('body').hasClass('page-checkout-review')) {
            if(sponsorWorkflow=='true') {
              $('.workflow-sponsorship').find('ol').find('li:nth-child(5)').addClass('prev');
              $('.workflow-sponsorship').find('ol').find('li:nth-child(6)').addClass('active');
              $('.workflow-sponsorship').find('ol').find('li:nth-child(7)').addClass('next');                                
              $('.workflow-sponsorship').find('ol').find('li:nth-child(4)').remove();          
              $('.workflow-sponsorship').find('ol').find('li:nth-child(3)').remove();          
              $('.workflow-sponsorship').find('ol').find('li:nth-child(2)').remove();          
              $('.workflow-sponsorship').find('ol').find('li:nth-child(1)').remove();          
              $('.workflow-sponsorship').children('ol').attr('start',5);
              $('.workflow-sponsorship').show();
            }
          }

          if($('body').hasClass('page-checkout') && $('body').hasClass('page-checkout-complete')) {
            if(sponsorWorkflow=='true') {
              $('.workflow-sponsorship').find('ol').find('li:nth-child(6)').addClass('prev');
              $('.workflow-sponsorship').find('ol').find('li:nth-child(7)').addClass('active');
              $('.workflow-sponsorship').find('ol').find('li:nth-child(8)').addClass('next');                                
              $('.workflow-sponsorship').find('ol').find('li:nth-child(9)').addClass('next'); 
              $('.workflow-sponsorship').find('ul').addClass('next'); 

              $('.workflow-sponsorship').find('ol').find('li:nth-child(5)').remove();          
              $('.workflow-sponsorship').find('ol').find('li:nth-child(4)').remove();          
              $('.workflow-sponsorship').find('ol').find('li:nth-child(3)').remove();          
              $('.workflow-sponsorship').find('ol').find('li:nth-child(2)').remove();          
              $('.workflow-sponsorship').find('ol').find('li:nth-child(1)').remove();          
              $('.workflow-sponsorship').children('ol').attr('start',6);
              $('.workflow-sponsorship').show();
              Cookies.remove('sponsorWorkflow');                               
            }
          }

        }

      });
    }
  };
/** end sponsor workflow **/


/* session-proposal workflow block active states */
  Drupal.behaviors.proposeSession = {
    attach: function(context, settings) {
      $(function() {

        if($('body').hasClass('front')) {
          Cookies.remove('sessionProposalFlow');                               
        }

        if($('body').hasClass('section-open-session-submission')) {
          if($('body').hasClass('not-logged-in')) {
            $('.workflow-session > ol > li:nth-child(1)').addClass('active');
            $('.workflow-session > ol > li:nth-child(2)').addClass('next');
          } 
          if($('body').hasClass('logged-in')) {
            $('.workflow-session > ol > li:nth-child(2)').addClass('prev');
            $('.workflow-session > ol > li:nth-child(3)').addClass('active');
            $('.workflow-session > ol > li:nth-child(4)').addClass('next');          
            $('.workflow-session > ol > li:nth-child(1)').remove();          
            $('.workflow-session').children('ol').attr('start',2);
          }
          Cookies.set('sessionProposalFlow', true, {expires: 1});
          sessionProposalFlow = Cookies.get('sessionProposalFlow');
        }

        if( $('body').hasClass('section-user') || $('body').hasClass('section-users') ) {
          sessionProposalFlow = Cookies.get('sessionProposalFlow');
          if(sessionProposalFlow=='true') {
            $('.workflow-session > ol > li:nth-child(1)').addClass('prev');
            $('.workflow-session > ol > li:nth-child(2)').addClass('active');
            $('.workflow-session > ol > li:nth-child(3)').addClass('next');
            $('.workflow-session').show();
          } 
        }

        if($('body').hasClass('page-node-add-session')) {
          $('.workflow-session > ol > li:nth-child(3)').addClass('prev');
          $('.workflow-session > ol > li:nth-child(4)').addClass('active');
          $('.workflow-session > ol > li:nth-child(4) > ol').addClass('active');
          $('.workflow-session > ol > li:nth-child(5)').addClass('next');                    
          $('.workflow-session > ol > li:nth-child(2)').remove();          
          $('.workflow-session > ol > li:nth-child(1)').remove();          
          $('.workflow-session').children('ol').attr('start',3);
        }

        if( $('body').hasClass('node-type-session') && $('body').hasClass('section-program') ) {
          sessionProposalFlow = Cookies.get('sessionProposalFlow');
          
          if(sessionProposalFlow=='true') {
            $('.workflow-session > ol > li:nth-child(5)').addClass('active');
            $('.workflow-session > ol > li:nth-child(6)').addClass('next');                                
            $('.workflow-session > ol > li:nth-child(7)').addClass('next'); 
            $('.workflow-session > ol > li:nth-child(8)').addClass('next'); 

            $('.workflow-session > ol > li:nth-child(4)').remove();          
            $('.workflow-session > ol > li:nth-child(3)').remove();          
            $('.workflow-session > ol > li:nth-child(2)').remove();          
            $('.workflow-session > ol > li:nth-child(1)').remove();          
            $('.workflow-session').children('ol').attr('start',5);
            $('.workflow-session').show();
//            Cookies.remove('sessionProposalFlow');                               
          }

        }

      });
    }
  };
/** end session-proposal workflow **/



})(jQuery);
