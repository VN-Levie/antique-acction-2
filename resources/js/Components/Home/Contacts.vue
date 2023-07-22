<template>
  <div id="contact" class="container-fluid-About  moto-spacing-top-large  moto-spacing-bottom-large ">

    <div class="">
      <div>
        <p class="text-center moto-text_system_8">
          OUT COMPANY
        </p>
        <h2 class="text-center moto-text_system_5">
          Contact Us
        </h2>

        <div class="moto-widget-image moto-preset-default moto-align-center moto-spacing-top-small top-spacing-marin">
          <span class="moto-widget-image-link margin-top-logo-about">
            <img src="/img/mt-1804-home-divider2.png" />
          </span>
        </div>
        <p class="text-center text-edit">If you have any questions related to our antique restoration services, please,
          don`t hesitate to contact us using the information below.</p>
        <div class=" container-fluid col-sm-1 col-sm-10">
          <div class="form">
            <div class="contact-info">
              <div class="info">
                <div class="information">
                  <img src="../../../../public/img/address/location.png" class="icon icon-fix" alt>
                  <div class="row">
                    <div>
                      <h1 class="h1-About-Us">Adress</h1> <br>
                      <p class="p-rewrite">391 Nam Ky Khoi Nghia, Quan 3, TPHCM</p>
                    </div>
                  </div>

                </div>
                <div class="information">
                  <img src="../../../../public/img/address/email.png" class="icon icon-fix" alt="" />
                  <div class="row">
                    <div>
                      <h1 class="h1-About-Us">Email</h1> <br>
                      <p class="p-rewrite">makecolor@gmail.com</p>
                    </div>
                  </div>
                </div>
                <div class="information">
                  <img src="../../../../public/img/address/phone.png" class="icon icon-fix" alt="" />
                  <div class="row">
                    <div>
                      <h1 class="h1-About-Us">Phone</h1> <br>
                      <p class="p-rewrite">123-456-789</p>
                    </div>
                  </div>
                </div>
                <div class="information">
                  <img src="../../../../public/img/address/clock.png" class="icon icon-fix" alt="" />
                  <div class="row">
                    <div>
                      <h1 class="h1-About-Us">Openning</h1> <br>
                      <p class="p-rewrite">Mon-Fri: 9am-6pm; Sun: 10am-1pm</p>
                    </div>
                  </div>
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

              <form @submit.prevent="submit">
                <div v-if="showMessage" class="text-edit-success m-2 p-4 rounded-lg">
                  Thank you for contacting
                </div>
                <div class="input-container">
                  <input v-model="form.name" type="text" class="input" placeholder="Name" />
                  <span v-if="form.errors.name" class="text-sm m-2">{{ form.errors.name }} </span>
                </div>
                <div class="input-container">
                  <input v-model="form.email" type="email" class="input" placeholder="Email" />
                  <span v-if="form.errors.email" class="text-sm m-2 ">{{ form.errors.email }} </span>
                </div>
                <div class="input-container">
                  <input v-model="form.phone" type="tel" class="input" placeholder="Phone" />
                  <span v-if="form.errors.phone" class="text-sm m-2 ">{{ form.errors.phone }}
                  </span>
                </div>
                <div class="input-container textarea">
                  <textarea v-model="form.body" placeholder="Message" class="input"></textarea>

                </div>
                <div class="input-container">
                  <span v-if="form.errors.body">{{ form.errors.body }} </span>
                </div>
                <br>
                <br>
                <button class="btn btn-lg">
                  Send Message
                </button>

              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</template>

<script setup>

import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';


const showMessage = ref(false);
const form = useForm({
  name: "",
  email: "",
  phone: "",
  body: ""
})

function setShowMessage(value) {
  showMessage.value = value;
}

function cleanForm() {
  form.reset();
  setShowMessage(true)
  setTimeout(() => setShowMessage(false), 2000)
}

const submit = () => {
  form.post(route('contact'), {
    preserveScroll: true,
    onSuccess: () => cleanForm(),
  })
}

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

.text-edit-success {
  padding: 20px;
  background-color: #ebd14f;
  /* Red */
  color: rgb(13, 13, 13);
  margin-bottom: 15px;
}


.text-edit {
  margin-top: 50px;
  font-size: 18px;
  color: rgb(172, 170, 170);

}

.top-spacing-marin {
  margin-top: -12px;
}

.h1-About-Us {
  font-size: 20px;
  font-weight: bold;
  margin-left: 24px;
}

.text-required {
  color: red;
}

.p-rewrite {
  font-size: 20px;
  margin-left: 24px;
  margin-top: -23px;
  margin-bottom: 30px;
}

.margin-top-logo-about {
  margin-top: 30px;
}

input::placeholder {
  font-weight: bold;

  color: rgb(85, 82, 82);
}

textarea::placeholder {
  font-weight: bold;

  color: rgb(85, 82, 82);
}

.form {
  width: 100%;
  margin-top: 38px;
  background-color: #fff;
  border-radius: 10px;
  z-index: 1000;
  overflow: hidden;
  display: grid;
  grid-template-columns: repeat(2, 1fr);
}

.contact-form {
  background-color: #ffffff;
  position: relative;
}

.contact-form:before {
  content: "";
  position: absolute;
  width: 26px;
  height: 26px;
  background-color: #ffffff;
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
  background-color: #eaeaea;
  position: relative;
  margin: 1rem 0;
}

.input {
  border-width: 0px;
  width: 100%;
  outline: none;
  background: none;
  padding: 0.6rem 1.2rem;
  color: #000000;
  font-weight: 500;
  font-size: 0.95rem;
  letter-spacing: 0.5px;
  transition: 0.3s;
}

textarea.input {
  padding: 0.8rem 1.2rem;
  min-height: 150px;

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
  background-color: #f3c95c;
  border: 2px solid #fafafa;
  font-size: 0.95rem;
  font-weight: 500;
  color: #000000;
  line-height: 1;
  border-radius: 25px;
  outline: none;
  cursor: pointer;
  transition: 0.3s;
  margin: 0;
}

.btn:hover {
  background-color: transparent;
  color: #000000;
  border: 2px solid #f3c95c;
}

.input-container span {
  height: 50%;
  position: absolute;
  top: -14px;
  transform: translateY(-50%);
  font-size: 0.8rem;
  padding: 0 0.4rem;
  color: red;
  pointer-events: fill;
  z-index: 500;
  bottom: -27px;
  left: -4px;
  padding-bottom: 10px;
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
  padding: 20px;
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

  font-weight: bold;
  font-size: 25px;


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
  width: 50px;
  padding-bottom: 30px;
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