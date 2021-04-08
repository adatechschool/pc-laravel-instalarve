const forms = document.querySelectorAll('#form-like');



forms.forEach((form) => {
  form.addEventListener('submit', (e) => {
    e.preventDefault();

    const url = form.getAttribute('action');
    const token = document.querySelector('meta[name="csrf-token"]').content;
    const heart = form.querySelector('#heart-like');
    const postId = form.querySelector('#post_id-like').value;
    var count = document.getElementById('count-like-'+postId);


    fetch(url, {
      headers: {
        'X-CSRF-TOKEN': token
      },
      credentials: "same-origin",
      method: 'post',
      body: new FormData(document.getElementById('form-like'))

      }).then(response => {

      response.json().then(data => {
        if (!data.canLike) { heart.className = "text-red-500 fas fa-heart"}
        else { heart.className = "far fa-heart cursor-pointer"}
        count.innerText = data.count;
        });
      });
      });

  });

//<i class="text-red-500 fas fa-heart"></i>
