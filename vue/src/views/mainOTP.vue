<template>
  <div class="h-screen py-56 px-3 ">
    <div class="container mx-auto">
      <div class="max-w-sm mx-auto md:max-w-lg rounded-lg shadow-slate-500 shadow-2xl md:h-80">
        <div class="w-full">
          <div class="bg-white h-68 py-3 rounded text-center">
            <h1 class="text-2xl font-bold">Two Factor Verification</h1>
            <div class="flex flex-col mt-4">
              <span>Enter the OTP you received at your Email</span>
              <div class="flex justify-center text-center mt-5">
                <a class="flex items-center text-blue-700 hover:text-blue-900 cursor-pointer">
                  <span class="font-bold">Resend OTP</span>
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </a>
              </div>
            </div>
            <div id="otp" class="flex flex-row justify-center text-center px-2 mt-5">
              <input class="m-2 border h-10 w-10 text-center form-control rounded" type="text" id="first" maxlength="1" />
              <input class="m-2 border h-10 w-10 text-center form-control rounded" type="text" id="second" maxlength="1" />
              <input class="m-2 border h-10 w-10 text-center form-control rounded" type="text" id="third" maxlength="1" />
              <input class="m-2 border h-10 w-10 text-center form-control rounded" type="text" id="fourth" maxlength="1" />
            </div>
            <div class="flex justify-center text-center mt-6">
              <a class="flex items-center text-blue-700 hover:text-blue-900 cursor-pointer">
                <button type="button" class="text-white bg-[#4285F4] hover:bg-[#4285F4]/90 focus:ring-4 focus:ring-[#4285F4]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#4285F4]/55 mr-2 mb-2">
                  Verify
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                  </svg>
                </button>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import {KeyIcon} from '@heroicons/vue/outline';

export default {
  name: "mainOTP",
  components: {
    KeyIcon
  }
}
document.addEventListener("DOMContentLoaded", function(event) {
  function OTPInput(){
    const inputs = document.querySelectorAll('#otp > *[id]');
    for (let i = 0; i < inputs.length; i++){
      inputs[i].addEventListener('keydown', function(event){
        if(event.key==="Backspace"){
          inputs[i].value='' ;
          if (i !==0) inputs[i - 1].focus();
        }
        else{
          if(i===inputs.length - 1 && inputs[i].value !=='' ){
            return true;
          }
          else if(event.keyCode> 47 && event.keyCode < 58) {
            inputs[i].value=event.key; if (i !==inputs.length - 1) inputs[i + 1].focus(); event.preventDefault();
          }
          else if (event.keyCode> 64 && event.keyCode < 91) {
            inputs[i].value=String.fromCharCode(event.keyCode);
            if (i !==inputs.length - 1) inputs[i + 1].focus(); event.preventDefault();
          }
        }
      });
    }
  }

  OTPInput();

});
</script>
<style scoped>

</style>
