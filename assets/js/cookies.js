window.addEventListener("load", function(){
var p;
window.cookieconsent.initialise({
  "palette": {
    "popup": {
      "background": "#252e39"
    },
    "button": {
      "background": "#14a7d0"
    }
  },
  "position": "bottom-right",
  "type": "opt-in",
  "content": {
    "message": "This website uses cookies to ensure you get the best experience.",
    "dismiss": "Do not allow!",
    "href": "https://memoryfriendly.org.uk/privacy"
  },
  onRevokeChoice: function() {
    console.log('<em>onRevokeChoice()</em> called');
  },
}, function (popup) {
  p = popup;
}, function (err) {
  console.error(err);
})
var revoke = document.getElementById('btn-revokeChoice');
if(revoke) {
  revoke.onclick = function (e) {
    console.log("Calling <em>revokeChoice()</em>");
    p.revokeChoice();

  };
}

});
