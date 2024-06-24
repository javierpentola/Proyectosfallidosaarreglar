document.addEventListener('DOMContentLoaded', function() {
    loadPosts();

    document.getElementById('commentForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const postId = document.getElementById('postId').value;
        const comment = document.getElementById('comment').value;

        if (comment === '') {
            alert('Por favor, escribe un comentario.');
        } else {
            fetch('add_comment.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ postId, comment })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    loadPosts();
                    document.getElementById('comment').value = '';
                } else {
                    alert('Error al agregar comentario.');
                }
            });
        }
    });
});

function loadPosts() {
    fetch('get_posts.php')
        .then(response => response.json())
        .then(data => {
            const postsDiv = document.getElementById('posts');
            postsDiv.innerHTML = '';
            data.posts.forEach(post => {
                const postDiv = document.createElement('div');
                postDiv.classList.add('post');
                postDiv.innerHTML = `
                    <h3>${post.title}</h3>
                    <p>${post.content}</p>
                    <div class="comments">
                        ${post.comments.map(comment => `<p>${comment.text}</p>`).join('')}
                    </div>
                `;
                postsDiv.appendChild(postDiv);
            });
        });
}
