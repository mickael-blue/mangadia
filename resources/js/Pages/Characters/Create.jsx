import React from "react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import SelectInput from '@/Components/SelectInput';
import TextareaInput from '@/Components/TextareaInput';
import FileInput from "@/Components/FileInput";
import { Transition } from '@headlessui/react';
import { Head, useForm, usePage } from "@inertiajs/inertia-react";

export default function Index({ auth }) {
    const mangasOption = usePage().props.mangas.data.map(({id, title}) => {
        return {
            key: id,
            label: title
        }
    });
    const { data, setData, post, errors, progress, processing, recentlySuccessful } = useForm({
        name: '',
        manga_id: mangasOption[0].key,
        biography: '',
        picture: '',
    });

    const submit = (e) => {
        e.preventDefault();

        post(route('character.store'));
    };

    return (
        <AuthenticatedLayout
            auth={auth}
            header={
                <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                    Add Character
                </h2>
            }
        >
            <Head title="Character" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <form onSubmit={submit} className="mt-6 space-y-6">
                        <div>
                            <InputLabel for="name" value="Name" />

                            <TextInput
                                id="name"
                                className="mt-1 block w-full"
                                value={data.name}
                                handleChange={(e) =>
                                    setData("name", e.target.value)
                                }
                                required
                                autofocus
                                autoComplete="name"
                            />

                            <InputError
                                className="mt-2"
                                message={errors.name}
                            />
                        </div>

                        <div>
                            <InputLabel for="manga" value="Manga"/>

                            <SelectInput
                                id="manga"
                                className="mt-1 block w-full"
                                value={data.manga}
                                options={mangasOption}
                                handleChange={(e) =>
                                    setData("manga_id", e.target.value)
                                }
                                required
                            />

                            <InputError
                                className="mt-2"
                                message={errors.manga_id}
                            />
                        </div>

                        <div>
                            <InputLabel for="biography" value="Biography"/>

                            <TextareaInput
                                id="biography"
                                className="mt-1 block w-full"
                                value={data.biography}
                                handleChange={(e) =>
                                    setData("biography", e.target.value)
                                }
                            />

                            <InputError
                                className="mt-2"
                                message={errors.biography}
                            />
                        </div>

                        <div>
                            <img src={data.picture} alt={data.name} />
                            <InputLabel for="picture" value="Picture" />

                            <FileInput
                                id="picture"
                                className="mt-1 block w-full"
                                value={data.picture}
                                handleChange={(e) =>
                                    setData("picture", e.target.files[0])
                                }
                            />
                            {progress && (
                                <progress value={progress.percentage} max="100">
                                    {progress.percentage}%
                                </progress>
                            )}

                            <InputError
                                className="mt-2"
                                message={errors.picture}
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
