var MyNamespace = {
    sayHello: function () {
        // add click event listener to button
        document.getElementById('scroll-to-top-button').addEventListener('click', function() {
         window.scrollTo({ top: 0, behavior: 'smooth' });
        });
  
    },
};

MyNamespace.sayHello();