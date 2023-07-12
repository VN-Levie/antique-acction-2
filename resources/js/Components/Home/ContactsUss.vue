<template>
  <div id="contactUs"
    class="container-fluid-About moto-widget moto-spacing-top-large moto-spacing-bottom-large moto-widget-row row-fixed ">

    <div class="spacing-bottom-contact ">
      <div>
        <p class="text-center moto-text_system_8">
          OUT COMPANY
        </p>
        <h2 class="text-center moto-text_system_5">
          Contact Us
        </h2>
        <div class="moto-widget-image moto-preset-default moto-align-center moto-spacing-top-small">
          <span class="moto-widget-image-link margin-top-logo-about">
            <img src="/img/mt-1804-home-divider2.png" />
          </span>
        </div>
        <div class=" container-fluid moto-spacing-top-medium1 col-sm-1 col-sm-10">

          <div class="form">
            <div class="contact-info">
              <h3 class="title">Let's get in touch</h3>
              <p class="text-form">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe
                dolorum adipisci recusandae praesentium dicta!
              </p>


              <div class="info">
                <div class="information">
                  <img src="../../../../public/img/address/location.png" class="icon" alt>
                  <p>391 Nam Ky Khoi Nghia, Quan 3, TPHCM</p>
                </div>
                <div class="information">
                  <img src="../../../../public/img/address/email.png" class="icon" alt="" />
                  <p>auction@gmail.com</p>
                </div>
                <div class="information">
                  <img src="../../../../public/img/address/phone.png" class="icon" alt="" />
                  <p>123-456-789</p>
                </div>
              </div>

              <div class="social-media">
                <p>Connect with us :</p>
                <div class="social-icons">
                  <a href="#">
                    <i class="fa fa-facebook "></i>
                  </a>
                  <a href="#">
                    <i class="fa fa-twitter "></i>
                  </a>
                  <a href="#">
                    <i class="fa fa-instagram "></i>
                  </a>
                  <a href="#">
                    <i class="fa fa-pinterest-p "></i>
                  </a>

                </div>
              </div>
            </div>

            <div class="contact-form">
              <span class="circle one"></span>
              <span class="circle two"></span>

              <form action="index.html" autocomplete="off">
                <div class="input-container">
                  <input type="text" name="name" class="input" />
                  <label for="">Username</label>
                  <span>Username</span>
                </div>
                <div class="input-container">
                  <input type="email" name="email" class="input" />
                  <label for="">Email</label>
                  <span>Email</span>
                </div>
                <div class="input-container">
                  <input type="tel" name="phone" class="input" />
                  <label for="">Phone</label>
                  <span>Phone</span>
                </div>
                <div class="input-container textarea">
                  <textarea name="message" class="input"></textarea>
                  <label for="">Message</label>
                  <span>Message</span>
                </div>
                <input type="submit" value="Send" class="btn" />
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</template>

<script>
const inputs = document.querySelectorAll(".input");

function focusFunc() {
  let parent = this.parentNode;
  parent.classList.add("focus");
}

function blurFunc() {
  let parent = this.parentNode;
  if (this.value == "") {
    parent.classList.remove("focus");
  }
}

inputs.forEach((input) => {
  input.addEventListener("focus", focusFunc);
  input.addEventListener("blur", blurFunc);
});

</script>

<style>
.moto-text_system_14 {
  font-weight: 400;
  font-style: normal;
  font-family: 'Raleway', sans-serif;
  color: #f3c95c;
  font-size: 48px;
  line-height: 1;
  letter-spacing: 0px;
}

.spacing-bottom-contact {
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: -82px;
}

.margin-top-logo-about {
  margin-top: 30px;
}

.form {
  width: 100%;
  max-width: 1076px;
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.1);
  z-index: 1000;
  overflow: hidden;
  display: grid;
  grid-template-columns: repeat(2, 1fr);
}

.contact-form {
  background-color: #939643;
  position: relative;
}

.contact-form:before {
  content: "";
  position: absolute;
  width: 26px;
  height: 26px;
  background-color: #939643;
  transform: rotate(45deg);
  top: 50px;
  left: -13px;
}

form {
  padding: 2.3rem 2.2rem;
  z-index: 10;
  overflow: hidden;
  position: relative;
}

.input-container {
  position: relative;
  margin: 1rem 0;
}

.input {
  width: 100%;
  outline: none;
  border: 3px solid #f3f3f3;
  background: none;
  padding: 0.6rem 1.2rem;
  color: #ffffff;
  font-weight: 500;
  font-size: 0.95rem;
  letter-spacing: 0.5px;
  border-radius: 25px;
  transition: 0.3s;
}

textarea.input {
  padding: 0.8rem 1.2rem;
  min-height: 150px;
  border-radius: 22px;
  resize: none;
  overflow-y: auto;
}

.input-container label {
  position: absolute;
  top: 50%;
  left: 15px;
  transform: translateY(-50%);
  padding: 0 0.4rem;
  color: #ffffff;
  font-size: 1rem;
  font-weight: 400;
  pointer-events: none;
  z-index: 1000;
  transition: 0.5s;
}

.input-container.textarea label {
  top: 1rem;
  transform: translateY(0);
}

.btn {
  padding: 0.6rem 1.3rem;
  background-color: #fff;
  border: 2px solid #fafafa;
  font-size: 0.95rem;
  font-weight: 500;
  color: #939643;
  line-height: 1;
  border-radius: 25px;
  outline: none;
  cursor: pointer;
  transition: 0.3s;
  margin: 0;
}

.btn:hover {
  background-color: transparent;
  color: #fff;
}

.input-container span {
  position: absolute;
  top: 0;
  left: 25px;
  transform: translateY(-50%);
  font-size: 0.8rem;
  padding: 0 0.4rem;
  color: transparent;
  pointer-events: fill;
  z-index: 500;
}

.input-container span:before,
.input-container span:after {
  content: "";
  position: absolute;
  width: 10%;
  opacity: 0;
  transition: 0.3s;
  height: 5px;
  background-color: #939643;
  top: 50%;
  transform: translateY(-50%);
}

.input-container span:before {
  left: 50%;
}

.input-container span:after {
  right: 50%;
}

.input-container.focus label {
  top: 0;
  transform: translateY(-50%);
  left: 25px;
  font-size: 0.8rem;
}

.input-container.focus span:before,
.input-container.focus span:after {
  width: 50%;
  opacity: 1;
}

.contact-info {
  padding: 2.3rem 2.2rem;
  position: relative;
}

.contact-info .title {
  color: #1abc9c;
}

.text-form {
  color: #333;
  margin: 1.5rem 0 2rem 0;
}

.information {
  display: flex;
  color: #555;
  margin: 0.7rem 0;
  align-items: center;
  font-size: 0.95rem;
}

.icon {
  width: 28px;
  margin-right: 0.7rem;
  color: #939643;
}

.social-media {
  padding: 2rem 0 0 0;
}

.social-media p {
  color: #333;
}

.social-icons {
  display: flex;
  margin-top: 0.5rem;
}

.social-icons a {
  width: 35px;
  height: 35px;
  border-radius: 5px;
  background: linear-gradient(45deg, #fffa5b, #4a4d1f);
  color: #fff;
  text-align: center;
  line-height: 35px;
  margin-right: 0.5rem;
  transition: 0.3s;
}

.social-icons a:hover {
  transform: scale(1.05);
}

.contact-info:before {
  content: "";
  position: absolute;
  width: 110px;
  height: 100px;
  border: 22px solid #939643;
  border-radius: 50%;
  bottom: -77px;
  right: 50px;
  opacity: 0.3;
}

.big-circle {
  position: absolute;
  width: 500px;
  height: 500px;
  border-radius: 50%;
  background: linear-gradient(to bottom, #1cd4af, #159b80);
  bottom: 50%;
  right: 50%;
  transform: translate(-40%, 38%);
}

.big-circle:after {
  content: "";
  position: absolute;
  width: 360px;
  height: 360px;
  background-color: #fafafa;
  border-radius: 50%;
  top: calc(50% - 180px);
  left: calc(50% - 180px);
}

.square {
  position: absolute;
  height: 400px;
  top: 50%;
  left: 50%;
  transform: translate(181%, 11%);
  opacity: 0.2;
}

@media (max-width: 850px) {
  .form {
    grid-template-columns: 1fr;
  }

  .contact-info:before {
    bottom: initial;
    top: -75px;
    right: 65px;
    transform: scale(0.95);
  }

  .contact-form:before {
    top: -13px;
    left: initial;
    right: 70px;
  }

  .square {
    transform: translate(140%, 43%);
    height: 350px;
  }

  .big-circle {
    bottom: 75%;
    transform: scale(0.9) translate(-40%, 30%);
    right: 50%;
  }

  .text-form {
    margin: 1rem 0 1.5rem 0;
  }

  .social-media {
    padding: 1.5rem 0 0 0;
  }
}

@media (max-width: 480px) {
  .container {
    padding: 1.5rem;
  }

  .contact-info:before {
    display: none;
  }

  .square,
  .big-circle {
    display: none;
  }

  form,
  .contact-info {
    padding: 1.7rem 1.6rem;
  }

  .text-form,
  .information,
  .social-media p {
    font-size: 0.8rem;
  }

  .title {
    font-size: 1.15rem;
  }

  .social-icons a {
    width: 30px;
    height: 30px;
    line-height: 30px;
  }

  .icon {
    width: 23px;
  }

  .input {
    padding: 0.45rem 1.2rem;
  }

  .btn {
    padding: 0.45rem 1.2rem;
  }
}
</style>