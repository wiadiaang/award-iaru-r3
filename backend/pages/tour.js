  'use strict';
$(document).ready(function() {

var enjoyhint_instance = new EnjoyHint({});

//simple config.
//Only one step - highlighting(with description) "New" button
//hide EnjoyHint after a click on the button.
var enjoyhint_script_steps = [
  {
    'click .jotour' : 'Click the "Change Password" menu to Change your password As soon as posible'
   // showSkip: false
  },

  {
    'click .drop-image' : 'Show your profile settings and change your password'
  },

];

//set script config
enjoyhint_instance.set(enjoyhint_script_steps);

//run Enjoyhint script
enjoyhint_instance.run();


           });
