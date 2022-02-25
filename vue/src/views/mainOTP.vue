<template>
  <div class="flex justify-center">
    <div class="w-full max-w-2xl sm:max-w-md md:max-w-xl xl:max-w-2xl lg:max-w-2xl">
      <div class="bg-amber-50 shadow-xl rounded px-12 pt-6 pb-8 mb-4 sm:mx-2 md:mx-2 lg:mx-2 xl:mx-2 my-10" x-data="pin()">
        <div class="text-gray-800 text-2xl flex justify-center border-b-2 py-2 mb-4 grid-cols-2 gap-2  ">
          <span class="w-8 h-8"><KeyIcon/></span>
          OTP Verification
        </div>
        <div class="">
          <input type="text" name="otp" id="otp" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" maxlength="4"/>
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

</script>
<style scoped>

</style>
