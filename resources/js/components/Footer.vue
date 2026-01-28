<script setup>
import { Button } from '@/components/ui/button'
import { Input } from '@/components/ui/input'
import { Separator } from '@/components/ui/separator'
</script>

<template>
  <footer class="bg-slate-50 border-t mt-auto">
    <div class="container mx-auto px-4 py-12">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        
        <div class="space-y-4">
          <h3 class="font-bold text-xl tracking-tight text-slate-900">NomeBrand S.r.l.</h3>
          <p class="text-sm font-medium text-muted-foreground leading-relaxed">
            Via Roma 123, 00100 Roma (RM)<br>
            P.IVA: 01234567890
          </p>
        </div>

        <div>
          <h4 class="font-bold text-sm uppercase tracking-wider text-slate-900 mb-4">Link Utili</h4>
          <ul class="text-sm font-medium space-y-2 text-muted-foreground">
            <li><a href="#" class="hover:text-primary transition-colors">FAQ</a></li>
            <li><a href="#" class="hover:text-primary transition-colors">Privacy Policy</a></li>
            <li><a href="#" class="hover:text-primary transition-colors">Termini e Condizioni</a></li>
          </ul>
        </div>

        <div>
          <h4 class="font-bold text-sm uppercase tracking-wider text-slate-900 mb-4">Supporto</h4>
          <ul class="text-sm font-medium space-y-2 text-muted-foreground">
            <li><a href="#" class="hover:text-primary transition-colors">Centro Assistenza</a></li>
            <li><a href="#" class="hover:text-primary transition-colors">Segnala un problema</a></li>
          </ul>
        </div>

        <div class="space-y-4">
          <h4 class="font-bold text-sm uppercase tracking-wider text-slate-900">Newsletter</h4>
          <p class="text-xs font-medium text-muted-foreground">Resta aggiornato sulle nostre novità.</p>
          <div class="flex gap-2">
            <Input type="email" placeholder="Email" class="max-w-[200px] bg-white" />
            <Button size="sm" class="bg-blue-600 hover:bg-blue-700 font-medium text-slate-50">Iscriviti</Button>
          </div>
        </div>
      </div>

      <Separator class="my-8 opacity-50" />

      <div class="text-center text-sm font-medium text-muted-foreground">
        © 2026 <span class="text-slate-900 font-bold">NomeBrand</span>. Tutti i diritti riservati.
      </div>
    </div>
  </footer>
</template>