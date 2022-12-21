import React from "react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import DangerButton from '@/Components/DangerButton';
import TextInput from '@/Components/TextInput';
import SelectInput from '@/Components/SelectInput';
import TextareaInput from "@/Components/TextareaInput";
import { Transition } from '@headlessui/react';
import { Head, useForm, usePage } from "@inertiajs/inertia-react";

export default function Index({ auth }) {
    const character = usePage().props.character.data;
    const mangasOption = usePage().props.mangas.data.map(({id, title}) => {
        return {
            key: id,
            label: title
        }
    });

    const { data, setData, put, delete: destroy, errors, processing, recentlySuccessful } = useForm({
        name: character.name,
        manga_id: character.manga.id,
        biography: character.biography,
        picture: character.picture
    });

    const removeCharacter = (e) => {
        e.preventDefault()
        destroy(route('character.destroy', character.id))
    }

    const submit = (e) => {
        e.preventDefault();
        put(route('character.update', character.id));
    };

    return (
        <AuthenticatedLayout
            auth={auth}
            header={
                <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                    {data.name}
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
                                value={data.manga_id}
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
                        <div className="flex items-center gap-4">
                            <PrimaryButton processing={processing}>
                                Save
                            </PrimaryButton>
                            <DangerButton onClick={removeCharacter} processing={processing}>
                                Remove
                            </DangerButton>

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
