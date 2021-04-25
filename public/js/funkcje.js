(function() {

    {
        //metoda delete
        let delete_links = document.querySelectorAll('[data-method="delete"]');
        console.log(delete_links.length);
        delete_links.forEach((link) => {
            link.addEventListener('click', (e) => {
                e.preventDefault();

                if (confirm('Confirm that action')) {
                    const opts = {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        }
                    }
                    fetch(link.href, opts)
                        .then(response => response.json())
                        .then(data => {
                            if (data.status == "OK") {
                                window.location.href = data.redirect_to;
                            }
                        });
                }


            });
        });
    }


})();