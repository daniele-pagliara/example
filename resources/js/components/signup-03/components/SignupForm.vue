<script setup lang="ts">
import { cn } from '@/lib/utils';
import { ref, h } from 'vue'
import { Button } from '@/components/ui/button';
import {
  Card,
  CardContent,
  CardDescription,
  CardHeader,
  CardTitle,
} from '@/components/ui/card';
import {
  Field,
  FieldDescription,
  FieldGroup,
  FieldLabel,
} from '@/components/ui/field';
import { Input } from '@/components/ui/input';

const props = defineProps({
  class: { type: null, required: false },
  registerPostUrl: String,
  csrfToken: String,
  loginPostUrl: String
});
</script>

<template>
  <div :class="cn('flex flex-col gap-6', props.class)">
    <Card>
      <CardHeader class="text-center">
        <CardTitle class="text-xl"> Crea il tuo account </CardTitle>
        <CardDescription>
          Inserisci la tua email per creare un account
        </CardDescription>
      </CardHeader>
      <CardContent>
        <form :action="registerPostUrl" method="POST" class="space-y-4">
          <input type="hidden" name="_token" :value="csrfToken" />
          <FieldGroup>
            <Field>
              <FieldLabel for="name"> Nome </FieldLabel>
              <Input id="name" type="text" name="name" placeholder="John" required />
            </Field>
            <Field>
              <FieldLabel for="surname"> Cognome </FieldLabel>
              <Input id="surname" type="text" name="surname" placeholder="Doe" required />
            </Field>
            <Field>
              <FieldLabel for="cf"> Codice Fiscale </FieldLabel>
              <Input id="cf" type="text" name="cf" placeholder="CF1234567890123456" maxlength="16" required />
            </Field>
            <Field>
              <FieldLabel for="address"> Indirizzo </FieldLabel>
              <Input id="address" type="text" name="address" placeholder="Via Roma, 123"/>
            </Field>
            <Field>
              <FieldLabel for="email"> Email </FieldLabel>
              <Input
                id="email"
                type="email"
                name="email"
                placeholder="m@example.com"
                required
              />
            </Field>
            <Field>
              <FieldLabel for="phone"> Telefono </FieldLabel>
              <Input id="phone" type="text" name="phone" placeholder="+39 123 456 7890" maxlength="20"/>
            </Field>
            <Field>
              <Field class="grid grid-cols-2 gap-4">
                <Field>
                  <FieldLabel for="password"> Password </FieldLabel>
                  <Input id="password" type="password" name="password" required />
                </Field>
                <Field>
                  <FieldLabel for="confirm-password">
                    Conferma Password
                  </FieldLabel>
                  <Input id="password_confirmation" type="password" name="password_confirmation" required />
                </Field>
              </Field>
              <FieldDescription>
                La password deve contenere almeno 8 caratteri.
              </FieldDescription>
            </Field>
            <Field>
              <Button type="submit" class="cursor-pointer"> Crea Account </Button>
              <FieldDescription class="text-center">
                Hai già un account? <a :href="loginPostUrl" class="text-primary hover:underline font-medium">Accedi</a>
              </FieldDescription>
            </Field>
          </FieldGroup>
        </form>
      </CardContent>
    </Card>
    <FieldDescription class="px-6 text-center">
      Cliccando su continua, accetti i nostri
      <a href="#">Termini di Servizio</a> e <a href="#">Informativa sulla Privacy</a>.
    </FieldDescription>
  </div>
</template>
