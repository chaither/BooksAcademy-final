@extends('layouts.web')

@section('content')
    <section id="contact-us"
        class="py-20 xl:py-28 2xl:py-32 min-h-screen flex flex-col justify-center w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12">
        <div
            class="rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 p-8 sm:p-12 shadow-sm flex flex-col lg:flex-row gap-10 items-start">
            <div class="max-w-md space-y-4">
                <span class="text-xs font-semibold text-blue-600 dark:text-blue-400 uppercase tracking-wider">Get in Touch</span>
                <h2
                    class="text-2xl sm:text-3xl lg:text-4xl 2xl:text-5xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                    Have a Question or Concern?</h2>
                <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed">Whether you are an author ready to publish, a reader looking for a specific book, or have any other concerns, fill out the form below and we will reach out in under 24 hours.</p>
                <div class="space-y-2 pt-2 text-xs text-slate-400">
                    <p>📍 Literary Media Building, Floor 4, Seattle, WA</p>
                    <p>✉️ contact@booksacademy.com</p>
                </div>
            </div>

            <div
                class="flex-1 w-full max-w-lg bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-850 rounded-lg p-6">
                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-4">
                    @csrf
                    
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative text-xs mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[10px] uppercase font-bold text-slate-400 mb-1.5">Your Name</label>
                            <input type="text" name="name" placeholder="John Doe" required
                                class="w-full px-3.5 py-2.5 rounded border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 text-slate-900 dark:text-white placeholder-slate-400 focus:border-blue-600 focus:outline-none text-xs">
                        </div>
                        <div>
                            <label class="block text-[10px] uppercase font-bold text-slate-400 mb-1.5">Email Address</label>
                            <input type="email" name="email" placeholder="john@example.com" required
                                class="w-full px-3.5 py-2.5 rounded border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 text-slate-900 dark:text-white placeholder-slate-400 focus:border-blue-600 focus:outline-none text-xs">
                        </div>
                    </div>
                    <div>
                        <label class="block text-[10px] uppercase font-bold text-slate-400 mb-1.5">Inquiry Type</label>
                        <select name="inquiry_type" required
                            class="w-full px-3.5 py-2.5 rounded border border-slate-200 dark:border-slate-800 bg-slate-900 text-white focus:outline-none text-xs">
                            <option value="general">General Inquiry</option>
                            <option value="publishing">Publishing Consultation</option>
                            <option value="availability">Book Availability</option>
                            <option value="support">Customer Support</option>
                            <option value="other">Other Concerns</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[10px] uppercase font-bold text-slate-400 mb-1.5">Message</label>
                        <textarea name="message" placeholder="How can we help you?" rows="3" required
                            class="w-full px-3.5 py-2.5 rounded border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 text-slate-900 dark:text-white placeholder-slate-400 focus:border-blue-600 focus:outline-none text-xs resize-none"></textarea>
                    </div>
                    <button type="submit"
                        class="w-full py-3 rounded bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs transition-colors">
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection
