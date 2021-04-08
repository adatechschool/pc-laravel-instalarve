const forms = document.querySelectorAll('#form-like');



forms.forEach((form) => {
  form.addEventListener('submit', (e) => {
    e.preventDefault();

    const url = form.getAttribute('action');
    const token = document.querySelector('meta[name="csrf-token"]').content;

    const postId = form.querySelector('#post_id-like').value;
    var count = form.querySelector('#count-like');
    console.log(count);



    fetch(url, {
      headers: {
        'X-CSRF-TOKEN': token
      },
      credentials: "same-origin",
      method: 'post',
      body: new FormData(document.getElementById('form-like'))
      // body: JSON.stringify({
      //   post_id : postId
      }).then(response => {

      response.json().then(data => {

        return count.innerHtml = data.count;
        console.log(count);
        console.log(data.count);


        });
      });
      });

  });
