<script setup>
import { Button } from '@/components/ui/button'
import { NavigationMenu, NavigationMenuItem, NavigationMenuLink, NavigationMenuList } from '@/components/ui/navigation-menu'
defineProps({
  loginUrl: String,
  registerUrl: String
})
</script>

<template>
  <header class="border-b bg-slate-50/95 backdrop-blur sticky top-0 z-50">
    <div class="container mx-auto flex h-16 items-center justify-between px-4">
      <div class="text-xl font-bold tracking-tight text-slate-900">Laravel App</div>

      <NavigationMenu>
        <NavigationMenuList class="hidden md:flex space-x-6">
          <NavigationMenuItem>
            <NavigationMenuLink href="#" class="text-sm font-medium text-muted-foreground hover:text-primary transition-colors">Aiuto</NavigationMenuLink>
          </NavigationMenuItem>
          <NavigationMenuItem>
            <NavigationMenuLink href="#" class="text-sm font-medium text-muted-foreground hover:text-primary transition-colors">Contatti</NavigationMenuLink>
          </NavigationMenuItem>
        </NavigationMenuList>
      </NavigationMenu>

      <div class="flex items-center gap-3">
        <a :href="loginUrl">
          <Button variant="default" size="sm" class="bg-blue-600 hover:bg-blue-700 font-medium px-5 text-slate-50 cursor-pointer">Accedi</Button>
        </a>
        <a :href="registerUrl">
          <Button variant="outline" size="sm" class="font-medium px-5 bg-white cursor-pointer">Registrati</Button>
        </a>
      </div>
    </div>
  </header>
</template>