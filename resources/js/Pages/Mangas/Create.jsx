import React from "react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import { Transition } from '@headlessui/react';
import { Head, useForm, usePage } from "@inertiajs/inertia-react";

export default function Index({ auth }) {
    const { data, setData, post, errors, processing, recentlySuccessful } = useForm({
        title: '',
    });

    const submit = (e) => {
        e.preventDefault();

        post(route('manga.store'));
    };

    return (
        <AuthenticatedLayout
            auth={auth}
            header={
                <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                    Add Manga
                </h2>
            }
        >
            <Head title="Manga" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <form onSubmit={submit} className="mt-6 space-y-6">
                        <div>
                            <InputLabel for="title" value="Title" />

                            <TextInput
                                id="title"
                                className="mt-1 block w-full"
                                value={data.title}
                                handleChange={(e) =>
                                    setData("title", e.target.value)
                                }
                                required
                                autofocus
                                autoComplete="title"
                            />

                            <InputError
                                className="mt-2"
                                message={errors.title}
                            />
                        </div>


                        <div className="flex items-center gap-4">
                            <PrimaryButton processing={processing}>
                                Save
                            </PrimaryButton>

                            <Transition
                                show={recentlySuccessful}
                                enterFrom="opacity-0"
                                leaveTo="opacity-0"
                                className="transition ease-in-out"
                            >
                                <p className="text-sm text-gray-600">Saved.</p>
                            </Transition>
                        </div>
                    </form>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
