<div style="position: relative; width: 100%; height: 0; padding-bottom: 56.25%;">
    <iframe src="" id="randomImage" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen style="position: absolute; width: 100%; height: 100%; top: 0; left: 0;"></iframe>
</div>
{{-- @dd('data') --}}
<script>
    const imageUrls = [
        'https://www.youtube.com/embed/PDSkFeMVNFs',
        'https://www.youtube.com/embed/41EG3t-nwMY',
        'https://www.youtube.com/embed/3nlSDxvt6JU',
        'https://www.youtube.com/embed/D-V0EHF30rk',
        'https://www.youtube.com/embed/fCpacv1cNZk',
        'https://www.youtube.com/embed/ib4hCR2DRBk',
        //ss
    ];

    function getRandomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    function changeRandomImageSrc() {
        const randomIndex = getRandomNumber(0, imageUrls.length - 1);
        const randomImageUrl = imageUrls[randomIndex];
        const imgElement = document.getElementById('randomImage');
        imgElement.src = randomImageUrl;
    }

    window.addEventListener('load', changeRandomImageSrc);
    
</script>