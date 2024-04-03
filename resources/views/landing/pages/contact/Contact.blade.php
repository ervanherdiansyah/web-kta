@extends('landing.layouts.Layout')

@section('content')
    <div class='px-[20px] md:px-[100px] py-[80px]'>
        <div class='flex flex-col justify-center items-center mb-20'>
            <h1 class='font-bold text-3xl text-[#176B87]'>Contact Us</h1>
            <p class="text-center">Any question or remarks? Just write us a message!</p>
        </div>
        <div class="mt-10">
            <div class='grid grid-cols-1 lg:grid-cols-2 '>
                <div class=' p-5 border-2 border-[#86B6F6] rounded-t-md md:rounded-l-lg'>
                    <div class='flex flex-col gap-2'>
                        <div>
                            <h1 class='font-bold text-[32px] text-[#176B87]'>Contact Information</h1>
                            <p>Should you have any question or concern, you can reach us by filling out the contact form,
                                calling us, coming to our office, finding us on other social networks, or you can personal
                                email
                                us at :</p>
                        </div>
                        <div class='flex items-center gap-2'>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                                    stroke="currentColor" class="w-6 h-6">
                                    <path strokeLinecap="round" strokeLinejoin="round"
                                        d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                </svg>
                            </div>
                            <a href="">089878786787</a>
                        </div>
                        <div class='flex items-center gap-2'>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                                    stroke="currentColor" class="w-6 h-6">
                                    <path strokeLinecap="round" strokeLinejoin="round"
                                        d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                </svg>
                            </div>
                            <a href="">smkbantim@yahoo.com</a>
                        </div>
                        <div class='flex gap-2'>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                                    stroke="currentColor" class="w-6 h-6">
                                    <path strokeLinecap="round" strokeLinejoin="round"
                                        d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path strokeLinecap="round" strokeLinejoin="round"
                                        d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                </svg>
                            </div>
                            <a href="">JL. RAYA CINUNUK KM. 16 NO. 172 CILEUNYI, Cinunuk, Kec. Cileunyi, Kab. Bandung, Jawa Barat</a>
                        </div>
                    </div>
                </div>

                <div class='p-5 border bg-[#86B6F6] border-[#86B6F6] rounded-b-md md:rounded-r-md'>
                    <div class='flex flex-col gap-4'>
                        <div class='flex flex-col'>
                            <label>Name</label>
                            <input type="text" class='border-b p-1 border-gray-500 active:outline-none rounded-md' />
                        </div>
                        <div class='flex flex-col'>
                            <label>Email</label>
                            <input type="text" class='border-b p-1 border-gray-500 outline-none rounded-md' />
                        </div>
                        <div class='flex flex-col'>
                            <label>Phone</label>
                            <input type="text" class='border-b p-1 border-gray-500 outline-none rounded-md' />
                        </div>
                        <div class='flex flex-col'>
                            <label>message</label>
                            <textarea name="" id="" cols="30" rows="5" class='border border-gray-500 outline-none rounded-md h-20' ></textarea>
                        </div>
                        <div class='flex justify-end py-4'>
                            <button class='bg-[#176B87] text-white px-5 py-2 rounded-full'>send</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
