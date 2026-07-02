@extends('layouts.web')

@section('content')
<style>
    /* Custom styles for the exact design */
    .bg-wave-pattern {
        background-color: #0F1B3D;
        background-image: radial-gradient(circle at 15% 50%, rgba(201, 162, 39, 0.05), transparent 25%), radial-gradient(circle at 85% 30%, rgba(255, 255, 255, 0.03), transparent 25%);
    }
    
    .input-with-icon {
        padding-left: 2.5rem;
    }
    
    .icon-wrapper {
        position: absolute;
        left: 0.75rem;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8; /* slate-400 */
        pointer-events: none;
    }

    /* Custom select chevron */
    .custom-select {
        appearance: none;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%2394a3b8' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
        background-position: right 0.5rem center;
        background-repeat: no-repeat;
        background-size: 1.5em 1.5em;
        padding-right: 2.5rem;
    }
</style>

<div class="min-h-screen bg-[#F8F5EE] pb-24 relative overflow-hidden">
    <!-- Dark Top Background (extends behind the hero and part of the card) -->
    <div class="absolute top-0 left-0 right-0 h-[600px] bg-wave-pattern z-0 rounded-b-[40px] md:rounded-b-[80px]">
        <!-- Subtle quill pen graphic on the right -->
        <img src="https://images.unsplash.com/photo-1583508197793-68d0ee50a142?q=80&w=600" alt="Quill" class="absolute right-0 top-0 h-[500px] object-cover opacity-10 mix-blend-overlay" style="mask-image: linear-gradient(to left, black, transparent);">
        <div class="absolute inset-0 bg-gradient-to-b from-[#0F1B3D] via-[#0F1B3D]/90 to-transparent"></div>
    </div>

    <!-- Main Content Container -->
    <div class="relative z-10 w-full max-w-[1200px] mx-auto px-4 sm:px-6 lg:px-8 pt-32 lg:pt-40">
        
        <!-- Hero Header -->
        <div class="text-center mb-12 sm:mb-16">
            <span class="text-[11px] font-bold text-[#C9A227] uppercase tracking-[0.2em] block mb-4 relative inline-block">
                GET IN TOUCH
                <span class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 w-8 h-[2px] bg-[#C9A227]"></span>
            </span>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-serif font-bold text-white mb-6 tracking-tight">We'd Love To Hear From You</h1>
            <p class="text-sm sm:text-base text-slate-300 max-w-2xl mx-auto font-serif leading-relaxed">Whether you are an author ready to publish, a reader looking for a specific book,<br class="hidden sm:block"> or have any other concerns, we are here to assist you.</p>
        </div>

        <!-- The Main Floating Card -->
        <div class="bg-white rounded-[24px] shadow-2xl overflow-hidden flex flex-col lg:flex-row min-h-[600px] relative">
            
            <!-- LEFT: Form Section -->
            <div class="w-full lg:w-1/2 p-8 sm:p-12 relative bg-white">
                <!-- Large BA watermark -->
                <div class="absolute inset-0 flex items-center justify-center opacity-[0.03] pointer-events-none select-none overflow-hidden">
                    <span class="font-serif text-[300px] text-slate-900 leading-none">BA</span>
                </div>
                
                <!-- Bottom left ink bottle graphic (simulated) -->
                <div class="absolute bottom-6 left-6 opacity-20 pointer-events-none w-16 h-16 bg-contain bg-no-repeat bg-bottom" style="background-image: url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 24 24%22 fill=%22none%22 stroke=%22currentColor%22 stroke-width=%221%22 stroke-linecap=%22round%22 stroke-linejoin=%22round%22%3E%3Cpath d=%22M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6%22/%3E%3C/svg%3E');"></div>

                <div class="relative z-10">
                    <div class="flex items-center gap-4 mb-3">
                        <div class="w-10 h-10 rounded-full bg-[#0F1B3D] flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4 text-white transform -rotate-45 ml-1 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                        </div>
                        <h2 class="text-3xl font-bold text-[#0F1B3D] font-serif">Send a Message</h2>
                    </div>
                    
                    <p class="text-slate-500 text-sm mb-8 pl-14">Fill out the form below and our support team<br>will reach out to you within <span class="text-[#C9A227] font-bold">24 hours</span>.</p>

                    <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                        @csrf
                        
                        @if(session('success'))
                            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg text-sm mb-6 flex items-center shadow-sm" role="alert">
                                <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <span class="block sm:inline font-medium">{{ session('success') }}</span>
                            </div>
                        @endif

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <!-- Name -->
                            <div>
                                <label class="block text-[10px] uppercase font-bold text-[#C9A227] tracking-widest mb-2">YOUR NAME</label>
                                <div class="relative">
                                    <div class="icon-wrapper">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                    </div>
                                    <input type="text" name="name" placeholder="John Doe" required
                                        class="w-full input-with-icon py-2.5 bg-white border border-slate-200 rounded-lg focus:border-[#C9A227] focus:ring-1 focus:ring-[#C9A227] text-slate-800 placeholder-slate-400 text-sm transition-colors shadow-sm">
                                </div>
                            </div>
                            
                            <!-- Email -->
                            <div>
                                <label class="block text-[10px] uppercase font-bold text-[#C9A227] tracking-widest mb-2">EMAIL ADDRESS</label>
                                <div class="relative">
                                    <div class="icon-wrapper">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                    </div>
                                    <input type="email" name="email" placeholder="john@example.com" required
                                        class="w-full input-with-icon py-2.5 bg-white border border-slate-200 rounded-lg focus:border-[#C9A227] focus:ring-1 focus:ring-[#C9A227] text-slate-800 placeholder-slate-400 text-sm transition-colors shadow-sm">
                                </div>
                            </div>
                        </div>

                        <!-- Inquiry Type -->
                        <div>
                            <label class="block text-[10px] uppercase font-bold text-[#C9A227] tracking-widest mb-2">INQUIRY TYPE</label>
                            <select name="inquiry_type" required
                                class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-lg focus:border-[#C9A227] focus:ring-1 focus:ring-[#C9A227] text-slate-800 text-sm transition-colors shadow-sm custom-select">
                                <option value="general">General Inquiry</option>
                                <option value="publishing">Publishing Consultation</option>
                                <option value="availability">Book Availability</option>
                                <option value="support">Customer Support</option>
                                <option value="other">Other Concerns</option>
                            </select>
                        </div>

                        <!-- Message -->
                        <div>
                            <label class="block text-[10px] uppercase font-bold text-[#C9A227] tracking-widest mb-2">MESSAGE</label>
                            <div class="relative">
                                <div class="absolute left-3 top-3 text-slate-400 pointer-events-none">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                </div>
                                <textarea name="message" placeholder="How can we help you?" rows="4" required
                                    class="w-full pl-10 pr-4 py-3 bg-white border border-slate-200 rounded-lg focus:border-[#C9A227] focus:ring-1 focus:ring-[#C9A227] text-slate-800 placeholder-slate-400 text-sm transition-colors resize-none shadow-sm"></textarea>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                            class="w-full py-3.5 mt-2 rounded-full bg-gradient-to-r from-[#C9A227] to-[#eab308] text-white font-bold text-xs tracking-widest uppercase shadow-[0_8px_15px_rgba(201,162,39,0.3)] hover:shadow-[0_12px_20px_rgba(201,162,39,0.5)] transition-all hover:-translate-y-0.5 flex items-center justify-center gap-2 group">
                            <svg class="w-4 h-4 transform -rotate-45 mb-1 group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                            Send Message
                        </button>
                    </form>
                </div>
            </div>

            <!-- RIGHT: Map & Info Section -->
            <div class="w-full lg:w-1/2 relative bg-[#0F1B3D] flex flex-col justify-between">
                
                <!-- The Map Background -->
                <div class="absolute inset-0 z-0 opacity-80 mix-blend-luminosity hover:mix-blend-normal hover:opacity-100 transition-all duration-700">
                    <iframe 
                        class="w-full h-full border-0"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d86066.07996767694!2d-122.42790933519894!3d47.61317429188043!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5490102c93e83355%3A0x102565466944d59a!2sSeattle%2C%20WA!5e0!3m2!1sen!2sus!4v1700000000000!5m2!1sen!2sus&style=feature:all|element:geometry|color:0x0F1B3D&style=feature:water|element:geometry|color:0x08102B&style=feature:road|element:geometry|color:0x223259" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

                <!-- Gradient Overlay from top to fade out the map under text -->
                <div class="absolute inset-x-0 top-0 h-[300px] bg-gradient-to-b from-[#0F1B3D] via-[#0F1B3D]/90 to-transparent z-0 pointer-events-none"></div>
                <div class="absolute inset-x-0 bottom-0 h-16 bg-gradient-to-t from-[#0F1B3D]/50 to-transparent z-0 pointer-events-none"></div>

                <!-- Contact Info Overlays -->
                <div class="relative z-10 p-8 sm:p-12">
                    <h3 class="text-2xl font-serif font-bold mb-8 text-[#C9A227]">Contact Information</h3>
                    
                    <div class="flex flex-col gap-8">
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-full bg-[#1e293b] flex items-center justify-center shrink-0 border border-white/5 shadow-lg backdrop-blur-sm">
                                <svg class="w-5 h-5 text-[#C9A227]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.243-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-[11px] font-bold uppercase tracking-widest mb-1 text-slate-100">ADDRESS</h4>
                                <p class="text-sm text-slate-300 leading-relaxed font-medium">Literary Media Building, Floor 4<br>Seattle, WA 98101</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-full bg-[#1e293b] flex items-center justify-center shrink-0 border border-white/5 shadow-lg backdrop-blur-sm">
                                <svg class="w-5 h-5 text-[#C9A227]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-[11px] font-bold uppercase tracking-widest mb-1 text-slate-100">EMAIL US</h4>
                                <p class="text-sm text-slate-300 leading-relaxed font-medium">contact@booksacademy.com<br>support@booksacademy.com</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Custom Map Pin purely for aesthetic overlap (optional) -->
                <!-- You can leave this out since iframe has its own pins, or overlay a custom UI over the iframe -->
            </div>
        </div>

        <!-- Bottom Feature Bar -->
        <div class="mt-8 bg-white/90 backdrop-blur-md border border-slate-200 rounded-[20px] shadow-lg py-5 px-6 sm:px-10 flex flex-wrap lg:flex-nowrap justify-between gap-6 relative z-10">
            <!-- Feature 1 -->
            <div class="flex items-center gap-4 flex-1 min-w-[200px]">
                <div class="w-10 h-10 rounded-full bg-[#0F1B3D] flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div>
                    <h4 class="text-sm font-bold text-[#0F1B3D]">Quick Response</h4>
                    <p class="text-[11px] text-slate-500 mt-0.5 leading-snug">We typically reply within<br>24 hours.</p>
                </div>
            </div>
            
            <!-- Feature 2 -->
            <div class="flex items-center gap-4 flex-1 min-w-[200px]">
                <div class="w-10 h-10 rounded-full bg-[#0F1B3D] flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <div>
                    <h4 class="text-sm font-bold text-[#0F1B3D]">Author Support</h4>
                    <p class="text-[11px] text-slate-500 mt-0.5 leading-snug">Dedicated assistance for<br>authors and publishers.</p>
                </div>
            </div>

            <!-- Feature 3 -->
            <div class="flex items-center gap-4 flex-1 min-w-[200px]">
                <div class="w-10 h-10 rounded-full bg-[#0F1B3D] flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                </div>
                <div>
                    <h4 class="text-sm font-bold text-[#0F1B3D]">Data Privacy</h4>
                    <p class="text-[11px] text-slate-500 mt-0.5 leading-snug">Your information is safe<br>with us.</p>
                </div>
            </div>

            <!-- Feature 4 -->
            <div class="flex items-center gap-4 flex-1 min-w-[200px]">
                <div class="w-10 h-10 rounded-full bg-[#0F1B3D] flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                </div>
                <div>
                    <h4 class="text-sm font-bold text-[#0F1B3D]">We're Here to Help</h4>
                    <p class="text-[11px] text-slate-500 mt-0.5 leading-snug">Our team is ready to support<br>you every step of the way.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
