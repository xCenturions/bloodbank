<?php $this->start('body'); ?>

<!-- <img src="data:image/png;base64, <?= $this->qr_image; ?> " /> -->


<!-- <a href="javascript:if(window.print)window.print()">Print</a> -->




  
	<script>
const buttons = document.querySelectorAll("button");

function buttonHandler() {
  const imgId = this.querySelector("img").getAttribute("id");

  document.querySelector('style').textContent =
    `@media print {
        img { display: none; }
        #${imgId} { display: block; }
      }`;

  if (window.print) {
    window.print();
  }
}

buttons.forEach(button => {
  button.addEventListener("click", buttonHandler);
});
	</script>

<button><img id="img1" src="data:image/png;base64, <?= $this->qr_image; ?>" alt=""></button>

<?php $this->end(); ?>


