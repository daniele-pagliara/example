<script setup>
import Header from '@/components/Header.vue'
import Footer from '@/components/Footer.vue'
// Importa il Provider e la Sidebar che hai appena postato
import { SidebarProvider, SidebarInset } from '@/components/ui/sidebar'
import AppSidebar from '@/components/AppSidebar.vue'
</script>

<template>
  <SidebarProvider> 
    <div class="flex min-h-screen w-full">
      
      <AppSidebar />

      <SidebarInset class="flex flex-col flex-1">
        <Header />
        <main class="flex-1 p-6">
           </main>
        <Footer />
      </SidebarInset>

    </div>
  </SidebarProvider>
</template>