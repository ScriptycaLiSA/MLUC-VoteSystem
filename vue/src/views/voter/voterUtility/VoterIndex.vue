<template>
  <div class="bg-slate-100 shadow-xl min-h-screen ">
    <div class="flex font-bold pl-2 text-4xl">
      <p>Election Title:</p>
    </div>
    <div
      class="bg-white-50 rounded-lg shadow-xl grid grid-cols-1 lg:grid-cols-1 xl:grid-cols-1 2xl:grid-cols-1 px-2 min-w-screen">
      <div class="py-4 px-4 max-w-lg"></div>
      <div>
        <label for="table1" class="font-semibold text-black md:hidden lg:hidden xl:hidden 2xl:hidden">Slide the table
          left to right</label>
        <div id="table1" class="flex flex-col mx-4">
          <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block py-4 min-w-full sm:px-6 lg:px-8">
              <div class="overflow-hidden shadow-md sm:rounded-lg">
                <div class="bg-grey-50 dark:bg-gray-400 px-2 py-3 border-solid border-grey-light border-b">
                  %Position%
                </div>
                <table class="min-w-full">
                  <thead class="bg-gray-50 dark:bg-gray-700">
                  <tr>
                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-center text-gray-700 uppercase dark:text-gray-400">
                      Select
                    </th>
                    <th scope="col"
                        class="py-3 px-6 text-xs font-medium tracking-wider text-center text-gray-700 uppercase dark:text-gray-400">
                      Profile
                    </th>
                    <th scope="col"
                        class="py-3 px-6 text-xs font-medium tracking-wider text-center text-gray-700 uppercase dark:text-gray-400">
                      Name
                    </th>
                    <th scope="col"
                        class="py-3 px-6 text-xs font-medium tracking-wider text-center text-gray-700 uppercase dark:text-gray-400">
                      Partylist
                    </th>
                  </tr>
                  </thead>
                  <tbody>

                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                      <div class="form-check">
                        <input class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                      </div>
                    </td>
                    <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                      <div class="relative w-12 h-12">
                        <img class="rounded-full border border-gray-100 shadow-sm" src="https://randomuser.me/api/portraits/women/81.jpg" alt="user image" />
                        <div class="absolute top-0 right-0 h-4 w-4 my-1 border-2 border-white rounded-full bg-green-400 z-2"></div>
                      </div>
                    </td>
                    <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                      <label class="form-check-label text-white mb-12">
                        %MOMO%
                      </label>
                    </td>
                    <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                      %Manyak%
                    </td>
                    <td class="hidden py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                    </td>
                  </tr>
                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                      <div class="form-check">
                        <input class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                      </div>
                    </td>
                    <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                      <div class="relative w-12 h-12">
                        <img class="rounded-full border w-12 h-12 border-gray-100 shadow-sm" src="https://www.bongbongmarcos.com/wp-content/uploads/2022/04/bongbong-marcos.jpeg" alt="user image" />
                        <div class="absolute top-0 right-0 h-3 w-3 my-1 border-2 border-white rounded-full bg-green-400 z-2"></div>
                      </div>
                    </td>
                    <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                      <label class="form-check-label text-white mb-12">
                        %Bong Bong Marcos%
                      </label>
                    </td>
                    <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                      %UniTeam%
                    </td>
                    <td class="hidden py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        </div>

      <div>
        <label for="table2" class="font-semibold text-black md:hidden lg:hidden xl:hidden 2xl:hidden">Slide the table
          left to right</label>
        <div id="table2" class="flex flex-col mx-4">
          <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block py-4 min-w-full sm:px-6 lg:px-8">
              <div class="overflow-hidden shadow-md sm:rounded-lg">
                <div class="bg-grey-50 dark:bg-gray-400 px-2 py-3 border-solid border-grey-light border-b">
                  %Position%
                </div>
                <table class="min-w-full">
                  <thead class="bg-gray-50 dark:bg-gray-700">
                  <tr>
                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-center text-gray-700 uppercase dark:text-gray-400">
                      Select
                    </th>
                    <th scope="col"
                        class="py-3 px-6 text-xs font-medium tracking-wider text-center text-gray-700 uppercase dark:text-gray-400">
                      Profile
                    </th>
                    <th scope="col"
                        class="py-3 px-6 text-xs font-medium tracking-wider text-center text-gray-700 uppercase dark:text-gray-400">
                      Name
                    </th>
                    <th scope="col"
                        class="py-3 px-6 text-xs font-medium tracking-wider text-center text-gray-700 uppercase dark:text-gray-400">
                      Partylist
                    </th>
                  </tr>
                  </thead>
                  <tbody>

                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                      <div class="form-check">
                        <input class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="flexRadioDefault2" id="flexRadioDefault3" checked>
                      </div>
                    </td>
                    <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                      <div class="relative w-12 h-12">
                        <img class="rounded-full border border-gray-100 shadow-sm" src="https://randomuser.me/api/portraits/women/81.jpg" alt="user image" />
                        <div class="absolute top-0 right-0 h-4 w-4 my-1 border-2 border-white rounded-full bg-green-400 z-2"></div>
                      </div>
                    </td>
                    <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                      <label class="form-check-label text-white mb-12">
                        %MOMO%
                      </label>
                    </td>
                    <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                      %Manyak%
                    </td>
                    <td class="hidden py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                    </td>
                  </tr>
                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                      <div class="form-check">
                        <input class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="flexRadioDefault2" id="flexRadioDefault4" checked>
                      </div>
                    </td>
                    <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                      <div class="relative w-12 h-12">
                        <img class="rounded-full border w-12 h-12 border-gray-100 shadow-sm" src="https://www.bongbongmarcos.com/wp-content/uploads/2022/04/bongbong-marcos.jpeg" alt="user image" />
                        <div class="absolute top-0 right-0 h-3 w-3 my-1 border-2 border-white rounded-full bg-green-400 z-2"></div>
                      </div>
                    </td>
                    <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                      <label class="form-check-label text-white mb-12">
                        %Bong Bong Marcos%
                      </label>
                    </td>
                    <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                      %UniTeam%
                    </td>
                    <td class="hidden py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      </div>
    <div class="mb-6">
    </div>
    <form>
      <div class="mb-6">
        <label  class="text-align: left mb-8 text-3xl font-medium text-gray-900 dark:text-gray-300">Governor</label>
        <div class="flex mb-8">
          <div>
            <div class="form-check">
              <input class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="flexRadioDefault12" id="f" checked>
              <label class="form-check-label inline-block text-gray-800">
                MOMO
              </label>
            </div>
          </div>
        </div>
      </div>
      <div class="mb-6">
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your password</label>
        <input type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
      </div>
      <div class="flex items-start mb-6">
        <div class="flex items-center h-5">
          <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800" required="">
        </div>
        <label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember me</label>
      </div>
      <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>


    <div class="col-md-6 mb-4">

      <h6 class="mb-2 pb-1">Gender: </h6>

      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="femaleGender"
               value="option1" checked />
        <label class="form-check-label" for="femaleGender">Female</label>
      </div>

    </div>

  </div>
</template>

<script>
export default {
  name: "VoterIndex"
}
</script>

<style scoped>

</style>
