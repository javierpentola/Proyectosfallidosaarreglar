// blog.js
window.onload = function() {
    fetch('blog.php')
        .then(response => response.json())
        .then(data => {
            const postsDiv = document.getElementById('posts');
            data.forEach(post => {
                const postDiv = document.createElement('div');
                postDiv.innerHTML = `<p>${post.comment}</p>`;
                postsDiv.appendChild(postDiv);
            });
        });
}
