<script setup>
import { Button } from '@/components/ui/button'
import { NavigationMenu, NavigationMenuItem, NavigationMenuLink, NavigationMenuList } from '@/components/ui/navigation-menu'

defineProps({
  dashboardUrl: String,
  databaseUrl: String,
  homeUrl: String,
  logoutUrl: String, 
  csrfToken: String
})


const handleLogout = () => {
  document.getElementById('logout-form').submit()
}
</script>

<template>
  <header class="border-b bg-background/95 backdrop-blur sticky top-0 z-50">
    <div class="container mx-auto flex h-16 items-center justify-between px-4">
      <a :href="dashboardUrl" class="text-xl font-bold tracking-tighter text-primary">Laravel App</a>

      <div class="flex items-center gap-2">
        <a :href="dashboardUrl"><Button variant="ghost" size="sm" class="cursor-pointer">Dashboard</Button></a>
        <a :href="databaseUrl"><Button variant="ghost" size="sm" class="cursor-pointer">Database</Button></a>

        <div class="h-4 w-[1px] bg-border mx-2"></div>
        <Button variant="destructive" size="sm" @click="handleLogout" class="px-3 cursor-pointer">
  <LogOut /> 
  <span>Logout</span>
</Button>

        <form id="logout-form" :action="logoutUrl" method="POST" class="hidden">
          <input type="hidden" name="_token" :value="csrfToken">
        </form>
      </div>
    </div>
  </header>
</template>