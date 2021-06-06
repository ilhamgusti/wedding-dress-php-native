<style>

input[type="checkbox"][id^="myCheckbox"] {
  display: none;
}

label {
  border: 1px solid #fff;
  display: block;
  position: relative;
  margin: 0 5px 30px;
  cursor: pointer;
}

label:before {
  background-color: white;
  color: white;
  content: " ";
  display: block;
  border-radius: 50%;
  border: 1px solid #32add2;
  position: absolute;
  top: -5px;
  left: -5px;
  width: 25px;
  height: 25px;
  text-align: center;
  line-height: 28px;
  transition-duration: 0.4s;
  transform: scale(0);
}

label img {
  transition-duration: 0.2s;
  transform-origin: 50% 50%;
}

:checked + label {
    border-color: #32add2;
    background: #32add214;
    border-radius: 5px;
}

:checked + label:before {
  content: "✓";
  background-color: #32add2;
  transform: scale(1);
}

:checked + label img {
  transform: scale(0.9);
  /* box-shadow: 0 0 5px #333; */
  z-index: -1;
}
</style>
<div class="col-sm-4 u-mb-medium">
    <!-- Modal -->
    <div class="c-modal c-modal--huge modal fade" id="chooseDress" tabindex="-1" role="dialog" aria-labelledby="chooseDress">
        <div class="c-modal__dialog modal-dialog" role="document">
            <div class="c-modal__content modal-content">
                <a class="c-modal__close c-modal__close--absolute u-text-mute u-opacity-medium" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-close"></i>
                </a>

                <div class="c-modal__body">

                    <div class="row u-justify-center">
                        <div class="col-md-7">
                            <div class="u-mt-medium u-text-center">
                                <h4 class="u-mb-xsmall">Choosing your best Wedding Dress.</h4>
                                <p class="u-text-mute u-mb-large">any model in this list is available for now.</p>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="listDress">
                        <?php foreach ($data['dresses'] as $i => $dressValue) { ?>
                            <div class="col-sm-6 col-md-3 u-nospace" data-dress-id="<?= $dressValue->id?>">
                            <input type="checkbox" id="myCheckbox<?= $dressValue->id ?>" name="dressIds[]" value="<?= $dressValue->id ?>"/>
                            <label for="myCheckbox<?= $dressValue->id ?>">
                            <article class="c-plan u-border-zero">
                                <img src="<?php echo URLROOT ?>/public/<?= $dressValue->imageUrl ?>" alt="Pricing Icon">

                                <h5 class="c-plan__title"></h5>

                                <h6 class="u-text-center"><?= $dressValue->name ?></h6>

                                <span class="c-plan__divider"></span>

                                <!-- <ul>
                                    <li class="c-plan__feature">
                                        <span>10</span> Projects
                                    </li>
                                    <li class="c-plan__feature">
                                        <span>3</span> Clients
                                    </li>
                                    <li class="c-plan__feature">
                                        <span>Unlimited</span> Messages
                                    </li>
                                </ul> -->
                            </article>
                            </label>
                            </div>
                        <?php }?>

                    </div>

                    <!-- <p class="u-text-mute u-text-center">Have a larger team? <a href="#">Contact us</a> for information about more enterprise options.</p> -->
                </div><!-- // .c-plans__body -->

<!-- 
                <footer class="c-modal__footer u-justify-center">
                    <a class="c-btn c-btn--green" href="#">Submit</a>
                </footer> -->
            </div>
        </div>
    </div>
</div>