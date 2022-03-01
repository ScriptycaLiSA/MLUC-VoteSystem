<template>
  <main class="bg-slate-100 shadow-xl px-3 min-h-screen">
    <div class="font-bold text-5xl py-3 pr-96">
      <p>DASHBOARD</p>
    </div>

    <div class="bg-slate-100 shadow-xl ml-10 px-10 min-h-screen">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 flex items-right" for="selectCollege">
        Select College:
      </label>
      <div class="flex items-right">
        <select class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none" id="selectCollege">
          <option disabled>----Choose a college----</option>
          <option>College of Information Technology</option>
          <option>College of Technical Education</option>
          <option>College of Technology</option>
          <option>College of Engineering</option>
          <option>College of Management</option>
          <option>Institute of Criminal Justice Education</option>
          <option>College of Arts And Sciences</option>
          <option>College of Arts And Law</option>
        </select>
      </div>
        <section class="container mx-auto p-6 font-mono">
          <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
            <div class="w-full overflow-x-auto">
              <table class="w-full">
                <thead>
                <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                  <th class="px-4 py-3">Name</th>
                  <th class="px-4 py-3">Position?</th>
                  <th class="px-4 py-3">Date</th>
                </tr>
                </thead>
                <tbody class="bg-white">
                <tr class="text-gray-700">
                  <td class="px-4 py-3 border">
                    <div class="flex items-center text-sm">
                      <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                        <img class="object-cover w-full h-full rounded-full" src="https://images.pexels.com/photos/5212324/pexels-photo-5212324.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" alt="" loading="lazy" />
                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                      </div>
                      <div>
                        <p class="font-semibold text-black">Sufyan</p>
                        <p class="text-xs text-gray-600">Developer</p>
                      </div>
                    </div>
                  </td>
                  <td class="px-4 py-3 text-xs border">
                    <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"> position_name </span>
                  </td>
                  <td class="px-4 py-3 text-sm border">6/4/2000</td>
                </tr>
                <tr class="text-gray-700">
                  <td class="px-4 py-3 border">
                    <div class="flex items-center text-sm">
                      <div class="relative w-8 h-8 mr-3 rounded-full">
                        <img class="object-cover w-full h-full rounded-full" src="https://images.pexels.com/photos/5212324/pexels-photo-5212324.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" alt="" loading="lazy" />
                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                      </div>
                      <div>
                        <p class="font-semibold text-black">Stevens</p>
                        <p class="text-xs text-gray-600">Programmer</p>
                      </div>
                    </div>
                  </td>
                  <td class="px-4 py-3 text-xs border">
                    <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"> position_name </span>
                  </td>
                  <td class="px-4 py-3 text-sm border">6/10/2020</td>
                </tr>
                <tr class="text-gray-700">
                  <td class="px-4 py-3 border">
                    <div class="flex items-center text-sm">
                      <div class="relative w-8 h-8 mr-3 rounded-full">
                        <img class="object-cover w-full h-full rounded-full" src="https://images.pexels.com/photos/5212324/pexels-photo-5212324.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" alt="" loading="lazy" />
                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                      </div>
                      <div>
                        <p class="font-semibold">Nora</p>
                        <p class="text-xs text-gray-600">Designer</p>
                      </div>
                    </div>
                  </td>
                  <td class="px-4 py-3 text-xs border">
                    <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"> position_name </span>
                  </td>
                  <td class="px-4 py-3 text-sm border">6/10/2020</td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </section>

      <section class="container mx-auto p-6 font-mono">
        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
          <div class="w-full overflow-x-auto">
            <table class="w-full">
              <thead>
              <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                <th class="px-4 py-3">Name</th>
                <th class="px-4 py-3">Position?</th>
                <th class="px-4 py-3">Date</th>
              </tr>
              </thead>
              <tbody class="bg-white">
              <tr class="text-gray-700">
                <td class="px-4 py-3 border">
                  <div class="flex items-center text-sm">
                    <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                      <img class="object-cover w-full h-full rounded-full" src="https://images.pexels.com/photos/5212324/pexels-photo-5212324.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" alt="" loading="lazy" />
                      <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                    </div>
                    <div>
                      <p class="font-semibold text-black">Sufyan</p>
                      <p class="text-xs text-gray-600">Developer</p>
                    </div>
                  </div>
                </td>
                <td class="px-4 py-3 text-xs border">
                  <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"> position_name </span>
                </td>
                <td class="px-4 py-3 text-sm border">6/4/2000</td>
              </tr>
              <tr class="text-gray-700">
                <td class="px-4 py-3 border">
                  <div class="flex items-center text-sm">
                    <div class="relative w-8 h-8 mr-3 rounded-full">
                      <img class="object-cover w-full h-full rounded-full" src="https://images.pexels.com/photos/5212324/pexels-photo-5212324.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" alt="" loading="lazy" />
                      <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                    </div>
                    <div>
                      <p class="font-semibold text-black">Stevens</p>
                      <p class="text-xs text-gray-600">Programmer</p>
                    </div>
                  </div>
                </td>
                <td class="px-4 py-3 text-xs border">
                  <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"> position_name </span>
                </td>
                <td class="px-4 py-3 text-sm border">6/10/2020</td>
              </tr>
              <tr class="text-gray-700">
                <td class="px-4 py-3 border">
                  <div class="flex items-center text-sm">
                    <div class="relative w-8 h-8 mr-3 rounded-full">
                      <img class="object-cover w-full h-full rounded-full" src="https://images.pexels.com/photos/5212324/pexels-photo-5212324.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" alt="" loading="lazy" />
                      <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                    </div>
                    <div>
                      <p class="font-semibold">Nora</p>
                      <p class="text-xs text-gray-600">Designer</p>
                    </div>
                  </div>
                </td>
                <td class="px-4 py-3 text-xs border">
                  <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"> position_name </span>
                </td>
                <td class="px-4 py-3 text-sm border">6/10/2020</td>
              </tr>
              </tbody>
            </table>
          </div>
        </div>
      </section>
      <button type="button" class="text-gray-900 bg-white w-40 border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-gray-600 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-800">SUBMIT RESULTS</button>
    </div>
  </main>
</template>

<script>
export default {
  name: "Dashboard"
}
</script>

<style scoped>

</style>
